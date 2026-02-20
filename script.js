function confirmerSuppression(id) {
    if (confirm("Voulez-vous supprimer ce salarié ?")) {
        window.location.href = "supprimerSalarie.php?id=" + id;
    }
}

new DataTable('#listeSalaries');