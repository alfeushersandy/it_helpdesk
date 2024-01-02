<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Departemen;
use App\Models\Lokasi;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;
use Carbon\Carbon;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiket = Ticket::with('departemen', 'lokasi')->get();
        $departemen = Departemen::all();
        $lokasi = Lokasi::all();
        return view('admin.tiket.index', compact('tiket', 'departemen', 'lokasi'));
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
        $request->validate([
            'client_name' => 'required',
            'id_lokasi' => 'required',
            'id_departemen' => 'required',
        ]);

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
                'text' => "Dear <b>IT Team</b> \nAda ticket baru.\n\n<b>No Ticket:</b> $tiket->no_ticket \n<b>Nama Client</b>: $tiket->client_name \n<b>Lokasi</b>: $tiket->id_lokasi \n<b>Departemen</b>: $tiket->id_departemen \n<b>Keluhan</b>: $tiket->problem \n\nMohon tim terkait menindak lanjuti, Terima Kasih"
            ]);
        }

        return back()->with('toast_success', 'Tiket Berhasil dibuat');
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
