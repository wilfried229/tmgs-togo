<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    //

    protected  $table = "agents";
    protected $fillable =['id','nom','site_id'];

    public function site(){

        return $this->belongsTo(Site::class,'site_id','id')->first();
    }


}
