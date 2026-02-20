<?php

include_once(__DIR__ . "/../db.php");

function getLesSalaries()
{
    try {
        global $conn;
        $sql = "SELECT * FROM salaries";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function nombreDeSalaries()
{
    try {
        global $conn;
        $sql = "SELECT COUNT(*) AS nombre_salaries FROM salaries";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['nombre_salaries'];
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function salaireMoyen()
{
    try {
        global $conn;
        $sql = "SELECT AVG(salaire) AS salaire_moyen FROM salaries";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['salaire_moyen'];
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function salaireMax()
{
    try {
        global $conn;
        $sql = "SELECT MAX(salaire) AS salaire_max FROM salaries";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['salaire_max'];
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function salaireMin()
{
    try {
        global $conn;
        $sql = "SELECT MIN(salaire) AS salaire_min FROM salaries";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['salaire_min'];
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function nombreDeSalariesParService()
{
    try {
        global $conn;
        $sql = "SELECT service, COUNT(*) AS nombre_salaries FROM salaries GROUP BY service";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
;

function getSalarieById($id)
{
    try {
        
        global $conn;
        $sql = "SELECT * FROM salaries WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

?>