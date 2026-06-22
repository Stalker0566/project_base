<?php


class PlanoDeTreino extends Model
{
    protected $table = 'plano_de_treino';
    public $timestamps = false;
    protected $fillable = ['designacao_do_plano', 'data_de_criacao','duracao_total_estimada'];

    public function exercicios()
    {
        return $this->hasMany(ExercicioPlano::class, 'plano_de_treino_id');
    }
}