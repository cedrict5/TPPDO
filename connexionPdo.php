<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $hostnom = 'host=srvmysql.btssio.dedyn.io';
    $usernom = 'TIANANO';
    $password = '05012006';
    $bdd = 'biblio';
    
    try {
        $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
        $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        $monPdo = null;
    }





    $req->setFetchMode(PDO::FETCH_ASSOC);
    $lesLignes=$req->fetchAll();
    foreach($lesLignes as $laLigne){
        echo "<tr>";
        echo "<td>" . $laLigne['num'] . "</td>
         <td>" . $laLigne['nom'] . "</td>
         <td>" . $laLigne['prenom'] . "</td>
         <td>" . $laLigne['nationalite'] . "</td>";
        echo "</tr>";
    }

    

    ?>
</body>
</html>