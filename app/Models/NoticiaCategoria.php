<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticiaCategoria extends Model
{
    public $timestamps = false;
    protected $table = 'noticia_categoria';
    protected $fillable = ['id', 'categoria', 'active'];
}
