<div style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Criar Novo Plano de Treino</h2>
    <form action="<?= url('/planos/store') ?>" method="POST">
        <label>Designação do Plano:</label><br>
        <input type="text" name="designacao_do_plano" required style="width:300px; padding:5px;"><br><br>

        <label>Data de Criação:</label><br>
        <input type="date" name="data_de_criacao" required style="width:300px; padding:5px;"><br><br>

        <button type="submit" style="padding:8px 15px; background:blue; color:white; border:none; border-radius:4px; cursor:pointer;">Guardar Plano</button>
        <a href="<?= url('/planos') ?>" style="margin-left: 10px;">Cancelar</a>
    </form>
</div>