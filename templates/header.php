<?php
include_once "config/url.php";
include_once "config/process.php";

if (isset($_SESSION["msg"])) {
    $printMsg = $_SESSION["msg"];
    $_SESSION["msg"] = "";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">

    <title>Lista de tarefas</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-light">
            <div class="navbar-container">
                <a href="<?= $BASE_URL ?>index.php" class="navbar-brand" aria-label="Página inicial">
                    <i class="fa fa-list logo-icon" aria-hidden="true"></i>
                </a>
                <div class="navbar-nav">
                    <a href="<?= $BASE_URL ?>index.php" class="nav-link">home</a>
                    <a href="<?= $BASE_URL ?>create.php" class="nav-link">adicionar tarefa</a>
                </div>
            </div>
        </nav>
    </header>