<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fabricante;
use App\Vehiculo;
class Vehiculo extends Model
{	
    
    protected $table = 'vehiculos';
    
        protected $primaryKey = 'serie';
    	protected $hidden = ['created_at','updated_at'];
        
        protected $fillable = array('color', 'cilindraje', 'potencia', 'peso', 'fabricante_id');
    
        public function fabricante(){
            return $this->belongsToMany('App\Fabricante');
        }
    
}
