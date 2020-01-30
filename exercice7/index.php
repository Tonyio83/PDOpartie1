<?php
include '../header.php';

function connectDb() {
    require_once '../../Params/params.php';
    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST . ';charset=utf8';
    try {
        $db = new PDO($dsn, USER, PASSWORD);
        return $db;
    } catch (Exception $exc) {
        die('La connexion à la base de données a échoué !');
    }
}

$db = connectDb();
$query = 'SELECT * FROM `clients`';
$clientsQueryStat = $db->query($query);
$clientsList = $clientsQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 class="text-center my-4 ">Liste des clients</h2>
<div class="row justify-content-center">
    <table class="table table-striped table-bordered col-8">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Carte de fidélité</th>
                <th scope="col">Numéro de Carte</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clientsList AS $client):
            ?>
        <tr>
            <td><?= $client['lastName'] ?></td>
            <td><?= $client['firstName'] ?></td>
            <td><?= $client['birthDate'] ?></td>
            <?php if ($client['card'] == 1) { ?>
            <td>oui</td>
            <td><?= $client['cardNumber'] ?></td>
            <?php } else { ?>
            <td>non</td>
            <td></td>
            <?php } ?>           
        </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>
</div>
<?php
    include '../footer.php';