<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'giftCards';

    protected $fillable = ['Monto','clientes_id','CODE','Porcentual','reclaimed_at'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'clientes_id');
    }
    
}
