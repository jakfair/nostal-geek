<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $table = "users";
    protected $fillable = ['avatar'];
    public $timestamps = false;
}
