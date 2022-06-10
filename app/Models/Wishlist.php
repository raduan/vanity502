<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'wishlist';

    protected $fillable = ['Nombre','cliente_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlistdetails()
    {
        return $this->hasMany('App\Models\Wishlistdetail', 'wishlist_id', 'id');
    }
    
}
