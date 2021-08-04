<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <?php
        require('db_connect.php');
        session_start();

        //Verification de connexion
        if (isset($_POST['login'])){
        $user= $_POST['login'];
        $password=  $_POST['password'];
        
        $query = $pdo->prepare("SELECT * FROM test_utilisateur WHERE login=?");
        $query->execute([$user]);
        $login = $query->fetch();
        if ($login && password_verify($_POST['password'], $login['password']))
        {
            echo "Identifiant valid!";
        } else {
            header('Location: index.php');
         }
        }
    ?>
    <form action="" method="post">
        <h3>Connexion</h3>
        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">

        <?php if (! empty($message)) { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>
    </form>
</body>
</html>