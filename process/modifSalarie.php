<?php

$id = $_POST["id"] ?? "";
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$dateNaissance = $_POST['email'] ?? '';
$dateEmbauche = $_POST['dateEmb'] ?? '';
$salaire = $_POST['salaire'] ?? '';
$service = $_POST['service'] ?? '';

include_once("../db.php");

try {
    global $conn;
    $sql = "UPDATE salaries SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, date_embauche = :date_embauche, salaire = :salaire, service = :service WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date_naissance', $dateNaissance);
    $stmt->bindParam(':date_embauche', $dateEmbauche);
    $stmt->bindParam(':salaire', $salaire);
    $stmt->bindParam(':service', $service);
    $stmt->execute();

    header("Location: ../listeSalaries.php");
    exit;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}