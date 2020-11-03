<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelModel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'id';
    public $timestamps;

    protected $fillable = [
        'nama', 'kelompok', 'deskripsi'
    ];
}
