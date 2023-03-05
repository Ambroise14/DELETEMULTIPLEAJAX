<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='categories';
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
}
