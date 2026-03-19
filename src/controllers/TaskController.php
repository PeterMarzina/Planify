<?php

require_once __DIR__ . "/../config/db_connection.php";

class TaskController
{

    // =====================
    // CREATE
    // =====================
    public function createTask($titel, $deadline, $beschrijving, $assignee)
    {

        global $pdo;

        $sql = "INSERT INTO Taak (titel, deadline, beschrijving, assignee)
                VALUES (:titel, :deadline, :beschrijving, :assignee)";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':titel' => $titel,
            ':deadline' => $deadline,
            ':beschrijving' => $beschrijving,
            ':assignee' => $assignee
        ]);
    }

    // =====================
    // READ (alle taken)
    // =====================
    public function getAllTasks()
    {

        global $pdo;

        $sql = "SELECT taak.*, User.naam, user.achternaam
                FROM taak
                LEFT JOIN user ON taak.assignee = user.id";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =====================
    // READ (1 taak)
    // =====================
    public function getTaskById($id)
    {

        global $pdo;

        $sql = "SELECT * FROM Taak WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // =====================
    // UPDATE
    // =====================
    public function updateTask($id, $titel, $deadline, $beschrijving, $assignee)
    {

        global $pdo;

        $sql = "UPDATE Taak
                SET titel = :titel,
                    deadline = :deadline,
                    beschrijving = :beschrijving,
                    assignee = :assignee
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':titel' => $titel,
            ':deadline' => $deadline,
            ':beschrijving' => $beschrijving,
            ':assignee' => $assignee
        ]);
    }

    // =====================
    // DELETE
    // =====================
    public function deleteTask($id)
    {

        global $pdo;

        $sql = "DELETE FROM Taak WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}
