<table>
    <thead>
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Contribuicao</td>
        <td>Descricao</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($heroes as $hero) { ?>
        <tr>
            <td><?php if (isset($hero->id)) echo htmlspecialchars($hero->id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($hero->nome)) echo htmlspecialchars($hero->nome, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($hero->contribuicao)) echo htmlspecialchars($hero->contribuicao, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($hero->descricao)) echo htmlspecialchars($hero->descricao, ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>