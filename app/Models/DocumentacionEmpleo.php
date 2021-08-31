<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentacionEmpleo extends Model
{

    public $timestamps = true;

    protected $table = 'documentacion_empleo';

    protected $fillable = [
        'id',
        'empresa',
        'estado',
        'fondep',
        'memoria',
        'estatuto',
        'autoridades',
        'dni',
        'cuit',
        'afip',
        'f931',
        'cbu',
        'repsal',
        'mipyme',
        'attrabajador',
        'djattrabajador'
    ];

    public function empresa()
    {
        return $this->belongsTo(\App\Models\EmpresaEmpleo::class, 'empresa', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\Models\TipoEstado::class, 'estado', 'id');
    }

    public function completa()
    {
        $columns = $this->getFillable();
        $attributes = $this->getAttributes();
        $arrTabla = [];

        foreach ($attributes as $campo) {
            if (is_null($campo) || strlen($campo) == 0) {
                $arrTabla[] = $campo;
            }
        }
        return (count($arrTabla) == 0) ? true : false;
    }

    public function personaCompleta()
    {
        return (!empty($this->fondep) && !empty($this->memoria) && !empty($this->estatuto) && !empty($this->autoridades) && !empty($this->dni)
            && !empty($this->cuit) && !empty($this->afip) && !empty($this->f931) && !empty($this->cbu) && !empty($this->repsal) && !empty($this->mipyme)) ? 1 : 0;
    }

    public function canEdit()
    {
        if ($this->estado == 19 or $this->estado == 20) {
            return true;
        }
        return false;
    }

    public function enviado()
    {
        $this->estado = 24;
        $this->save();
    }

    public function cargando()
    {
        $this->estado = 19;
        $this->save();
    }
}
