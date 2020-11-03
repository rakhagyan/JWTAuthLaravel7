<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    public $timestamps;

    protected $fillable = [
        'nama', 'gender', 'nik', 'tanggal_lahir'
    ];
}
