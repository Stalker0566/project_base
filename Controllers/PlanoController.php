<?php
require_once __DIR__.'/../Model/plano_de_treino.php';
require_once __DIR__.'/../Model/exercicio_plano.php';

class PlanoController
{
    // 1. Показываем список планов
    public function index()
    {
        $planos = PlanoDeTreino::all();
        require 'Views/ListarPlanos.php';
    }

    // 2. Форма создания плана
    public function create()
    {
        require 'Views/CriarPlano.php';
    }

    // 3. Сохранение плана
    public function store()
    {
        PlanoDeTreino::create([
            'designacao_do_plano' => trim($_POST['designacao_do_plano']),
            'data_de_criacao' => $_POST['data_de_criacao'],
            'duracao_total_estimada' => 0
        ]);
        header('Location: ' . url('/planos'));
        exit;
    }

    // 4. Форма добавления упражнения
    public function createExercicio($plano_id)
    {
        require 'Views/CriarExercicio.php';
    }

    // 5. Сохранение упражнения И ПЕРЕСЧЁТ СУММЫ
    public function storeExercicio($plano_id)
    {
        // Создаем упражнение
        ExercicioPlano::create([
            'nome_do_exercicio' => trim($_POST['nome_do_exercicio']),
            'series' => (int)$_POST['series'],
            'repeticoes' => (int)$_POST['repeticoes'],
            'duracao' => (int)$_POST['duracao'],
            'plano_de_treino_id' => $plano_id
        ]);

        // Обновляем сумму в плане
        $plano = PlanoDeTreino::find($plano_id);
        if ($plano) {
            $soma = $plano->exercicios()->sum('duracao');
            $plano->update(['duracao_total_estimada' => $soma]);
        }

        header('Location: ' . url('/planos'));
        exit;
    }
}