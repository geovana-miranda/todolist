<?php
include_once "templates/header.php";
?>

<section class="container">
    <div class="title">
        <h2>Editar tarefa</h2>
    </div>
    <form action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $task["id"] ?>">
        <div class="mb-3">
            <label for="task" class="form-label">Tarefa: </label>
            <input type="text" class="form-control" name="task" value="<?= $task["task"] ?>" maxlength="30" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição: </label>
            <input type="text" class="form-control" name="description" value="<?= $task["description"] ?>" maxlength="50">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" <?= $task["status"] ? "checked" : "" ?>>
            <label class="form-check-label">Concluída</label>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</section>