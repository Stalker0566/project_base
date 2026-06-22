<div style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Adicionar Exercício ao Plano #<?= $plano_id ?></h2>
    <form action="<?= url('/planos/' . $plano_id . '/exercicios/store') ?>" method="POST">
        <label>Nome do Exercício:</label><br>
        <input type="text" name="nome_do_exercicio" required style="width:300px; padding:5px;"><br><br>

        <label>Séries:</label><br>
        <input type="number" name="series" required style="width:300px; padding:5px;"><br><br>

        <label>Repetições:</label><br>
        <input type="number" name="repeticoes" required style="width:300px; padding:5px;"><br><br>

        <label>Duração (em minutos):</label><br>
        <input type="number" name="duracao" required style="width:300px; padding:5px;"><br><br>

        <button type="submit" style="padding:8px 15px; background:blue; color:white; border:none; border-radius:4px; cursor:pointer;">Guardar Exercício</button>
        <a href="<?= url('/planos') ?>" style="margin-left: 10px;">Cancelar</a>
    </form>
</div>