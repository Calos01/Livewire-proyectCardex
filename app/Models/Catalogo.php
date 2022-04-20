<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'catalogos';

    protected $fillable = ['name_category'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'catalogo_id', 'id');
    }
    
}
