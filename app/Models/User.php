<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = ['name','email','is_root','account_type'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente', 'user_id', 'id');
    }
    
}
