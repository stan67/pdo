<?php

require "connec.php";
$pdo= new PDO(DSN, USER,PASS);

    if (isset($_POST['firstname']) && $_POST['firstname'] != " " && isset($_POST['lastname']) && $_POST['lastname'] != " ")
    {
        $lastname = trim($_POST['lastname']);
        $firstname = trim($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $firstname = htmlentities($_POST['firstname']);

        $query="INSERT INTO friend (firstname , lastname) VALUES (:firstname, :lastname)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $statement->execute();

        if ($statement){
            echo "<h2>Ok</h2>";
            echo '<meta http-equiv="refresh" content="2;URL= index.php"">';
        } else {
            echo "<h2>Not ok</h2>";
        }
}