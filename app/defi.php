<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class defi extends Model
{
    protected $table = "defis";
    protected $fillable = ['icone'];
    public $timestamps = false;
}
