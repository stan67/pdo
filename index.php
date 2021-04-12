<?php

require "connec.php";

$pdo= new PDO(DSN, USER,PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO pour la vie</title>
</head>
<body>
<h1>Liste des amis</h1>
<ul>
    <?php foreach ($friends as $friend){
        echo "<p>" ."<li>" .$friend["lastname"]. " " .$friend["firstname"] ."</li>";
    }?>
</ul>

<br>
<br>

<form method="post" action="redi.php">
    <input type="text" name="firstname" maxlength="45" placeholder="firstname" required>
    <input type="text" name="lastname"  maxlength="45" placeholder="lastname" required>
    <button type="submit">Envoyer</button>
</form>

</body>
</html>
