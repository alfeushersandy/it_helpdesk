<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'no_ticket',
        'tanggal',
        'client_no_hp',
        'client_name',
        'id_lokasi',
        'id_departemen',
        'problem',
        'id_user',
        't_exection',
        't_finish',
        'tgl_finish',
        'status'
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
