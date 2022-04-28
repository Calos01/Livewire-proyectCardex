<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'productos';

    protected $fillable = ['catalogo_id','fecha_ingreso','fecha_salida','marca','presentacion','lote','fecha_vencimiento','resp_ingreso','resp_salida','precio_sin_igv','area','cant_entrada','cant_salida','saldo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catalogo()
    {
        return $this->hasOne('App\Models\Catalogo', 'id', 'catalogo_id');
    }

    public function scopeSelectfilter($query,$select){
        if($select==""){
            return;
        }
        else{
            $query->when($select, function($query) use ($select){
                $query->where('catalogo_id',$select);
            });
        };
    }


    public function scopeSearch($query, $term){
        $term="%$term%";
        $query->where(function($query) use ($term){
            $query->where('marca','like',$term)
            ->orWhere('presentacion','like',$term)
            ->orWhere('resp_ingreso','like',$term)
            ->orWhere('resp_salida','like',$term)
            ->orWhere('area','like',$term);
        });
    }

}
