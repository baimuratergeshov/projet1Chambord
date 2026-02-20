<?php

include_once("./partials/header.php");
include_once(__DIR__ . "/db.php");

?>
<div class=" mx-auto my-5">
    <div class="row">
        <h2 class="text-center mb-4">Ajouter un salarié</h2>
        <form action="process/ajoutSalarie.php" method="POST" class="">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <label for="nom" class="form-label">Nom du salarié</label>
                    <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom du salarié">
                    <label for="prenom">Prénom du salarié</label>
                    <input id="prenom" class="form-control" type="text" name="prenom" placeholder="Prénom du salarié">
                    <label for="email">Date de naissance du salarié</label>
                    <input id="email" class="form-control" type="date" name="email"
                        placeholder="Date de naissance du salarié">
                    <label for="dateEmb">Date d'embauche du salarié</label>
                    <input id="dateEmb" class="form-control" type="date" name="dateEmb"
                        placeholder="Date d'embauche du salarié">
                    <label for="salaire">Salaire du salarié</label>
                    <input id="salaire" class="form-control" type="number" name="salaire"
                        placeholder="Salaire du salarié">
                    <label for="service">Service du salarié</label>
                    <select id="service" class="form-control" name="service">
                        <option value="">Choisir un service</option>
                        <option value="Comptable">Comptable</option>
                        <option value="Entretien">Entretien</option>
                        <option value="Cuisine">Cuisine</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-4 w-100">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include_once("./partials/footer.php");

?>