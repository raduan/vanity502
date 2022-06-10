<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudade extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ciudades';

    protected $fillable = ['Nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente', 'ciudades_id', 'id');
    }
    
}
