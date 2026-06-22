<?php


class ExercicioPlano extends Model
{
    protected $table = 'exercicio_plano';
    public $timestamps = false;
    protected $fillable = ['nome_do_exercicio','series','repeticoes','duracao','plano_de_treino_id'];

    public function plano()
    {

        return $this->belongsTo(PlanoDeTreino::class, 'plano_de_treino_id');
    }
}