<div style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Lista de Planos de Treino</h2>
    <a href="<?= url('/planos/create') ?>" style="display:inline-block; margin-bottom:15px; padding:8px 15px; background:green; color:white; text-decoration:none; border-radius:4px;">+ Criar Novo Plano</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Designação do Plano</th>
            <th>Data de Criação</th>
            <th>Duração Total (minutos)</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($planos as $plano): ?>
        <tr>
            <td><?= $plano->id ?></td>
            <td><?= htmlspecialchars($plano->designacao_do_plano ?? '') ?></td>
            <td><?= htmlspecialchars($plano->data_de_criacao ?? '') ?></td>
            <td><strong><?= htmlspecialchars($plano->duracao_total_estimada ?? '0') ?></strong> mins</td>
            <td>
                <a href="<?= url('/planos/' . $plano->id . '/exercicios/create') ?>" style="color: blue; font-weight: bold;">+ Adicionar Exercício</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>