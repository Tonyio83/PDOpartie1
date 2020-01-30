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
$query = 'SELECT * FROM `shows` ORDER BY `title` ASC';
$showsQueryStat = $db->query($query);
$showsList = $showsQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 class="text-center my-4 ">Agenda des spectacles</h2>
<div class="row justify-content-center">
    <ul class="list-group col-5 text-center">
        <?php
        foreach ($showsList AS $show):
            ?>
            <li class="list-group-item"><?= $show['title'] . ' par ' . $show['performer'] . ' le ' . $show['date'] . ' à ' . $show['startTime'] ?></li>
                <?php
            endforeach
            ?>
    </ul>
</div>
<?php
    include '../footer.php';