<?php
include_once "templates/header.php";
?>


<section class="container">
    <div class="title-container">
        <h1>Lista de tarefas</h1>
        <a href="<?= $BASE_URL ?>create.php" title="Adicionar" aria-label="Adicionar nova tarefa">
            <i class="fa fa-plus-square add-icon" aria-hidden="true"></i>
        </a>
    </div>

    <?php if (isset($printMsg) && $printMsg != ""): ?>
        <p class="msg"> <?= $printMsg ?></p>
    <?php endif; ?>

    <div class="list">
        <?php if (count($tasks) > 0): ?>

            <ul class="list-group">

                <?php foreach ($tasks as $task): ?>
                    <li class="list-group-item">

                        <div class="task-title">
                            <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                                <input type="hidden" name="type" value="check">
                                <input type="hidden" name="id" value="<?= $task["id"] ?>">
                                <input type="checkbox" name="status" id="status" <?= $task["status"] ? "checked" : "" ?> aria-label="Marcar tarefa '<?= $task['task'] ?>' como concluída"
                                    onchange="this.form.submit()">
                            </form>
                            <div>
                                <p class="task"><?= $task["task"] ?></p>
                                <p class="task-desc"><?= $task["description"] ?></p>
                            </div>
                        </div>

                        <div class="task-actions">
                            <a href="<?= $BASE_URL ?>edit.php?id=<?= $task["id"] ?>" title="Editar" aria-label="Editar tarefa">
                                <i class="fas fa-edit edit-icon" aria-hidden="true"></i>
                            </a>
                            <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $task["id"] ?>">
                                <button type="submit" class="delete-btn" title="Excluir" aria-label="Excluir tarefa">
                                    <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>

        <?php else: ?>
            <p>Você ainda não adicionou nenhuma tarefa.</p>
        <?php endif; ?>
    </div>

</section>

<?php
include_once "templates/footer.php";
?>