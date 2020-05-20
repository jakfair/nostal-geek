<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class fiche extends Model
{
    protected $table = "animejeu";
    protected $fillable = ['banniere','icone'];
    public $timestamps = false;
}
