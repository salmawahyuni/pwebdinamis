<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = "kategori";
    protected $primaryKey = 'id';
    protected $fillable = ['id','namakategori','jumlah'];
}
