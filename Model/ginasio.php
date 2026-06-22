<?php
// use Illuminate\Database\Eloquent\Model;
Class Ginasio extends Model
{
    protected $table = 'ginasio';
    protected $fillable = ['nome', 'morada', 'telefone', 'email'];

    public $timestamps = false;

}