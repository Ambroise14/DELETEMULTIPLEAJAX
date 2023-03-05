<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table='products';
    protected $filname=[];

    public function statut(){
        $tatut="";
        switch($this->statut){
            case '0':$tatut="moins vendu";break;
            case '1':$tatut="tres vendu";break;
        }
        return $tatut;
    }


    public function popular(){
        $tatut="";
        switch($this->statut){
            case '0':$tatut="moins vendu";break;
            case '1':$tatut="tres vendu";break;
        }
        return $tatut;
    }
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function images(){
        return $this->hasMany(gallery::class);
    }
}
