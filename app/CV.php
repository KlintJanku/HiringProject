<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    // Table Name
    protected $table = 'c_v_s';
    // Primary Key
    public $primaryKey = 'id';
    
    public function users (){
        return $this->belongsTo('App\User');
    }
}
