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
            <h1 class="major">Liste de toutes les villes</h1>
            <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Departement</th>
                            <th>Ville</th>
                            <th>Code postal</th>
                            <th>Canton</th>
                            <th>Population</th>
                            <th>Densite</th>
                            <th>Surface</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // $users est défini dans le controlleur, on peut l'utiliser dans la vue
                        foreach ($villes as $ville)
                        { ?>
                            <tr>
                                <td><?= $ville->getId() ?></td>
                                <td><?= remove_accents($ville->getDepartement()) ?></td>
                                <td><?= $ville->getVille() ?></td>
                                <td><?= $ville->getCode_postal() ?></td>
                                <td><?= $ville->getCanton() ?></td>
                                <td><?= $ville->getPopulation() ?></td>
                                <td><?= $ville->getDensite() ?></td>
                                <td><?= $ville->getSurface() ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </section>

</div>

<?php require_once "views/common/footer.php"; ?>
</body>
</html>