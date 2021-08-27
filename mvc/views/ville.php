<!DOCTYPE HTML>
<html>
<?php require_once "views/common/header.php"; ?>
<body class="is-preload">

<?php require_once "views/common/navbar.php"; ?>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">ville correspondante <?= remove_accents($new_ville->getVille()) ?></h1>
            <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ville</th>
                            <th>Departement</th>
                            <th>Code postal</th>
                            <th>Canton</th>
                            <th>Population</th>
                            <th>Densite</th>
                            <th>Surface</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $new_ville->getId() ?></td>
                                <td><?= remove_accents($new_ville->getVille()) ?></td>
                                <td><?= $new_ville->getDepartement() ?></td>
                                <td><?= $new_ville->getCode_postal() ?></td>
                                <td><?= $new_ville->getCanton() ?></td>
                                <td><?= $new_ville->getPopulation() ?></td>
                                <td><?= $new_ville->getDensite() ?></td>
                                <td><?= $new_ville->getSurface() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

        </div>
    </section>

</div>

<?php require_once "views/common/footer.php"; ?>
</body>
</html>