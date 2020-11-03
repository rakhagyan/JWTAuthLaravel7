<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    public $timestamps;

    protected $fillable = [
        'nama', 'kelompok'
    ];
}
