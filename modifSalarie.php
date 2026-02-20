<?php

include_once("./partials/header.php");
include_once("./utils/function.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $salarie = getSalarieById($id);

    if (!$salarie) {
        echo "Salarié non trouvé.";
        exit;
    }
} else {
    echo "ID du salarié non spécifié.";
    exit;
}

$services = ['comptable', 'entretien', 'cuisine', 'commercial'];
?>

<div class=" mx-auto my-5">
    <div class="row">
        <h2 class="text-center mb-4">Modifier un salarié</h2>
        <form action="process/modifSalarie.php" method="POST" class="">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <input type="hidden" name="id" value="<?= $salarie['id'] ?? '' ?>">
                    <label for="nom" class="form-label">Nom du salarié</label>
                    <input id="nom" value="<?= $salarie['nom'] ?? '' ?>" class="form-control" type="text" name="nom"
                        placeholder="Nom du salarié">
                    <label for="prenom">Prénom du salarié</label>
                    <input id="prenom" value="<?= $salarie['prenom'] ?? '' ?>" class="form-control" type="text"
                        name="prenom" placeholder="Prénom du salarié">
                    <label for="email">Date de naissance du salarié</label>
                    <input id="email" value="<?= $salarie['date_naissance'] ?? '' ?>" class="form-control" type="date"
                        name="email" placeholder="Date de naissance du salarié">
                    <label for="dateEmb">Date d'embauche du salarié</label>
                    <input id="dateEmb" value="<?= $salarie['date_embauche'] ?? '' ?>" class="form-control" type="date"
                        name="dateEmb" placeholder="Date d'embauche du salarié">
                    <label for="salaire">Salaire du salarié</label>
                    <input id="salaire" value="<?= $salarie['salaire'] ?? '' ?>" class="form-control" type="number"
                        name="salaire" placeholder="Salaire du salarié">
                    <label for="service">Service du salarié</label>
                    <select id="service" class="form-control" name="service">
                        <option value="" disabled>Choisir un service</option>
                        <?php foreach ($services as $service): ?>
                            <option <?= strtolower($salarie['service'] ?? '') === $service ? 'selected="selected"' : '' ?>
                                value="<?= $service ?>">
                                <?= ucfirst($service) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary mt-4 w-100">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include_once("./partials/footer.php");

?>