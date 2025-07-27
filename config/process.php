<?php

session_start();

include_once "connection.php";
include_once "url.php";


$data = $_POST;

if ($data) {

    if ($data["type"] === "create") {
        $task = $data["task"];
        $description = $data["description"];

        $query = "INSERT INTO tasks (task, description) VALUES (:task, :description) ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":task", $task);
        $stmt->bindParam(":description", $description);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Tarefa adicionada com sucesso";
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }

    if ($data["type"] === "check") {
        $id = $data["id"];
        $data["status"] === "on" ? $status = true : $status = false;
        $query = "UPDATE tasks SET status = :status WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":status", $status);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }

    }

    if ($data["type"] === "edit") {

        $id = $data["id"];
        $task = $data["task"];
        $description = $data["description"];
        $data["status"] === "on" ? $status = true : $status = false;

        $query = "UPDATE tasks SET task = :task, description = :description, status = :status WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":task", $task);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Tarefa alterada com sucesso";
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }

    if ($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Tarefa excluída com sucesso";
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
        }

    }

     header("Location: " . $BASE_URL . "../index.php");

} else {

    $id;

    if ($_GET) {
        $id = $_GET["id"];
    }

    if (!empty($id)) {

        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $task = $stmt->fetch();

    } else {
        $tasks = [];

        $query = "SELECT * FROM tasks";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $tasks = $stmt->fetchAll();
    }
}

$conn = null;