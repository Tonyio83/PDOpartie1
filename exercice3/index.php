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
$query = 'SELECT * FROM `clients` WHERE `id` BETWEEN (1) AND (20)';
$clientsQueryStat = $db->query($query);
$clientsList = $clientsQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 class="text-center my-4 ">Liste des 20 premiers clients</h2>
<div class="row justify-content-center">
    <ul class="list-group col-3 text-center">
        <?php
        foreach ($clientsList AS $client):
        ?>
            <li class="list-group-item"><?= $client['lastName'] . ' ' . $client['firstName'] ?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php
    include '../footer.php';