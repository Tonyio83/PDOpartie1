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
$query = 'SELECT * FROM `showTypes`';
$showTypesQueryStat = $db->query($query);
$showTypesList = $showTypesQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 class="text-center my-4 ">Liste des types de spectacles</h2>
<div class="row justify-content-center">
<ul class="list-group col-3 text-center">
<?php
foreach ($showTypesList AS $showType):
    ?>
    <li class="list-group-item"><?= $showType['type'] ?></li>
    <?php
endforeach;
?>
</ul>
</div>
<?php
    include '../footer.php';