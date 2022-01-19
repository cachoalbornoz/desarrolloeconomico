<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = true;

    protected $table = 'noticia';

    protected $fillable = ['titulo', 'subtitulo', 'cuerpo', 'autor', 'imagen', 'categoria', 'fecha_publicacion', 'active'];

    public function categoria()
    {
        return $this->belongsTo(\App\Models\NoticiaCategoria::class, 'categoria', 'id');
    }
}
