<?php

include_once(__DIR__ . "/db.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        global $conn;
        $sql = "DELETE FROM salaries WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: listeSalaries.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
