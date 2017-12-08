<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehiculo;
class Fabricante extends Model
{
    
	
	protected $table = 'fabricantes';
	
	protected $hidden = ['created_at','updated_at'];
	protected $fillable = array('nombre', 'telefono');
	
	public function vehiculos(){
		return $this->hasMany('App\Vehiculo');
	}
}
