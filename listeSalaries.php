<?php

include_once("./partials/header.php");

include_once("./utils/function.php");

$lesSalaries = getLesSalaries();

$nbSalaries = nombreDeSalaries();

$salaireMoyen = salaireMoyen();

$salaireMax = salaireMax();

$salaireMin = salaireMin();

$nombreDeSalariesParService = nombreDeSalariesParService();
?>



<div class="container my-5">

  <button class="btn btn-success text-right" onclick="window.location.href='ajouterSalarie.php'">
    Ajouter un salarié
  </button>

  <table class="table table-hover" id="listeSalaries">
    <thead>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
      <th>Date d'embauche</th>
      <th>Salaire</th>
      <th>Service</th>
      <th>Modifier</th>
      <th>Supprimer</th>
    </thead>

    <tbody>
      <?php foreach ($lesSalaries as $leSalarie): ?>
        <tr>
          <td><?= htmlspecialchars($leSalarie['id']); ?></td>
          <td><?= htmlspecialchars($leSalarie['nom']); ?></td>
          <td><?= htmlspecialchars($leSalarie['prenom']); ?></td>
          <td><?= htmlspecialchars(date('d/m/Y', strtotime($leSalarie['date_naissance']))); ?></td>
          <td><?= htmlspecialchars(date('d/m/Y', strtotime($leSalarie['date_embauche']))); ?></td>
          <td><?= htmlspecialchars($leSalarie['salaire']); ?>€</td>
          <td><?= ucfirst(htmlspecialchars($leSalarie['service'])); ?></td>
          <td>
            <button class="btn btn-primary"
              onclick="window.location.href='modifSalarie.php?id=<?= $leSalarie['id'] ?>'">Modifier</button>
          </td>
          <td>
            <button class="btn btn-danger" onclick="confirmerSuppression(<?= $leSalarie['id'] ?>)">
              Supprimer
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

    <tr>
      <td colspan="1">Nombre de Salairiés</td>
      <td><?= $nbSalaries; ?> salariés</td>
    </tr>
    <tr>
      <td colspan="5">Salaire moyen</td>
      <td><?= round($salaireMoyen, 2); ?>€</td>
    </tr>
    <tr>
      <td colspan="5">Salaire maximum</td>
      <td><?= round($salaireMax, 2); ?>€</td>
    </tr>
    <tr>
      <td colspan="5">Salaire minimum</td>
      <td><?= round($salaireMin, 2); ?>€</td>
    </tr>
    <?php foreach ($nombreDeSalariesParService as $nombre): ?>
      <tr>
        <td colspan="6">
          Nombre de salariés dans le service <?= ucfirst(htmlspecialchars($nombre['service'])); ?>
        </td>
        <td><?= $nombre['nombre_salaries']; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>

<?php include_once "./partials/footer.php"; ?>

<script src="script.js"></script>