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
    $usernom = 'Cedric';
    $password = 'mdp';
    $bdd = 'biblio';
    
    try {
        $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
        $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        $monPdo = null;
    }
    
    ?>
</body>
</html>