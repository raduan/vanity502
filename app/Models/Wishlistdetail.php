<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlistdetail extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'wishlistdetails';

    protected $fillable = ['cliente_id','producto_id','wishlist_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wishlist()
    {
        return $this->hasOne('App\Models\Wishlist', 'id', 'wishlist_id');
    }
    
}
