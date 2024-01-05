<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
//import Resource "PostResource"
use App\Http\Resources\TiketResource;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'client_name'     => 'required',
            'client_no_hp'     => 'required',
            'email'   => 'required',
            'id_lokasi'   => 'required',
            'id_departemen'   => 'required',
            'problem'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        /**
        * algorithm generate no invoice
        */
        $length = 10;
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }

        //generate no invoice
        $notiket = 'IT-'.Str::upper($random);

        $tiket = Ticket::create([
                'no_ticket' => $notiket,
                'client_no_hp' => $request->client_no_hp,
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'client_name' => $request->client_name,
                'id_lokasi' => $request->id_lokasi,
                'id_departemen' => $request->id_departemen,
                'problem' => $request->problem,
        ]);

        if($tiket){
            Telegram::sendMessage([
                'chat_id' => '-4079041421',
                'parse_mode' => 'html',
                'text' => "Dear <b>IT Team</b> \nAda ticket baru.\n\n<b>No Ticket:</b> $tiket->no_ticket \n<b>Nama Client</b>: $tiket->client_name \n<b>No Hp</b>: $tiket->client_no_hp \n<b>Lokasi</b>: $tiket->id_lokasi \n<b>Departemen</b>: $tiket->id_departemen \n<b>Keluhan</b>: $tiket->problem \n\nMohon tim terkait menindak lanjuti, Terima Kasih"
            ]);
        }

        $data = [
            'name' => $tiket->client_name,
            'body' => "<b>No Ticket:</b> $tiket->no_ticket <br><b>Nama Client</b>: $tiket->client_name <br><b>No Hp</b>: $tiket->client_no_hp <br><b>Lokasi</b>: $tiket->id_lokasi <br><b>Departemen</b>: $tiket->id_departemen <br><b>Keluhan</b>: $tiket->problem"
        ];
       
        Mail::to($tiket->email)->send(new SendEmail($data));

        //return response
        return new TiketResource(true, 'Tiket Berhasil dibuat, silahkan cek email anda!', $tiket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
