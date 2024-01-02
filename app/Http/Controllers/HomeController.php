<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Departemen;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $lokasi = Lokasi::all();
        $departemen = Departemen::all();
        return view('welcome', compact('lokasi', 'departemen'));
    }
}
