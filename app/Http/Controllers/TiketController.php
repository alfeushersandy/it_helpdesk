<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Departemen;
use App\Models\Lokasi;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email',
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
        $notiket = 'IT-' . Str::upper($random);

        $tiket = Ticket::create([
            'no_ticket' => $notiket,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'client_no_hp' => $request->client_no_hp,
            'email' => $request->email,
            'client_name' => $request->client_name,
            'id_lokasi' => $request->id_lokasi,
            'id_departemen' => $request->id_departemen,
            'problem' => $request->problem,
        ]);

        if ($tiket) {
            Telegram::sendMessage([
                'chat_id' => '-4079041421',
                'text' => "Dear IT Team \nAda ticket baru.\n\nNo Ticket: $tiket->no_ticket \nNama Client: $tiket->client_name \nLokasi: $tiket->id_lokasi \nDepartemen: $tiket->id_departemen \nKeluhan: $tiket->problem \n\nMohon tim terkait menindak lanjuti, Terima Kasih"
            ]);
        }

        $data = [
            'name' => $tiket->client_name,
            'body' => "<b>No Ticket:</b> $tiket->no_ticket <br><b>Nama Client</b>: $tiket->client_name <br><b>No Hp</b>: $tiket->client_no_hp <br><b>Lokasi</b>: $tiket->id_lokasi <br><b>Departemen</b>: $tiket->id_departemen <br><b>Keluhan</b>: $tiket->problem"
        ];

        Mail::to($tiket->email)->send(new SendEmail($data));


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

    public function approve(string $id)
    {
        $tiket = Ticket::find($id);

        $tiket->update([
            'status' => 'Approve by ' . Auth::user()->name,
            'user_appr' => Auth::user()->id,
            't_approve' => Carbon::now()
        ]);

        $message = "Dear IT Team\n" .
            "No Ticket: <b>{$tiket->no_ticket}</b>\n" .
            "Nama Client: <b>{$tiket->client_name}</b>\n" .
            "Lokasi: <b>{$tiket->lokasi->nama_lokasi}</b>\n" .
            "Departemen: <b>{$tiket->departemen->departemen}</b>\n" .
            "Keluhan: \n" .
            "<b>{$tiket->problem}</b>\n\n" .
            "Ticket Telah Di Approve Oleh <b>{$tiket->userApprove->name}</b>";

        Telegram::sendMessage([
            'chat_id' => '-4079041421',
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);

        return back()->with('toast_success', 'Berhasil Approve Ticket dengan Nomor ' . $tiket->no_ticket);
    }
}
