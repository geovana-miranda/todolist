<?php
include_once "templates/header.php";
?>

<section class="container">
    <div class="title">
        <h2>Adicionar tarefa</h2>
    </div>
    <form action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="mb-3">
            <label for="task" class="form-label">Tarefa: </label>
            <input type="text" class="form-control" name="task" maxlength="30" required >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição: </label>
            <input type="text" class="form-control" name="description" maxlength="50">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</section>