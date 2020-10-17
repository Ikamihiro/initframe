<?php if($message = Session::get('sucesso')) { ?>
    <h4><?php echo $message; ?></h4>
<?php } ?>
<h1>Herois</h1>
<a href="<?php echo URL_BASE?>heroes/create">
    Novo Heroi
</a>
<table>
    <thead>
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Contribuicao</td>
        <td>Descricao</td>
        <td>Ações</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($heroes as $hero) { ?>
        <tr>
            <td><?php if (isset($hero->id)) echo $hero->id; ?></td>
            <td><?php if (isset($hero->nome)) echo $hero->nome; ?></td>
            <td><?php if (isset($hero->contribuicao)) echo $hero->contribuicao; ?></td>
            <td><?php if (isset($hero->descricao)) echo $hero->descricao; ?></td>
            <td>
                <a href="<?php echo URL_BASE?>heroes/edit/<?php if (isset($hero->id)) { echo $hero->id; } ?>">
                    Editar
                </a>
                <form action="<?php echo URL_BASE?>heroes/delete/<?php if (isset($hero->id)) { echo $hero->id; } ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>