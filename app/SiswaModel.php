<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $timestamps;

    protected $fillable = [
        'nama', 'tanggal_lahir', 'gender', 'alamat', 'nik'
    ];
}
