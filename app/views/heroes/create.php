<div>
    <form action="<?php echo URL_BASE?>heroes/store" method="post">
        <h2>Store Heroe</h2>
        <label for="nome">Name:</label><br>
        <input type="text" name="nome" id="nome" placeholder="Nome do Heroe">
        <?php if (isset($erros['nome'])) { echo $erros['nome']; } ?>
        <br><br>

        <label for="contribuicao">Contribuicao:</label><br>
        <textarea name="contribuicao" id="contribuicao"></textarea>
        <?php if (isset($erros['contribuicao'])) { echo $erros['contribuicao']; } ?>
        <br><br>

        <label for="descricao">Descricao:</label><br>
        <textarea name="descricao" id="descricao"></textarea>
        <?php if (isset($erros['descricao'])) { echo $erros['descricao']; } ?>
        <br><br>

        <button type="submit">Salvar</button>
    </form>
</div>
