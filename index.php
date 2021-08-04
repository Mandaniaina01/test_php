<!DOCTYPE html>
<html>
<head>
    <title>Extraction des liens</title>
</head>
<body>
<?php require_once('db_connect.php');
        session_start(); ?>
<form action="" method="post">
    <h3>Lien</h3>
    <input type="text" name="lien" placeholder="Votre lien">
    <input type="submit" value="Valider " name="submit">
</form>
<?php
    if (isset($_POST['lien'])){
        //lit la page à copier
        $page=file_get_contents($_POST['lien']);

        //Le preg_split prend tous les liens du type http*, [a-z0--_./?&;=] sert à 
        //prendre tout dans L'URL, même si il y a des var1=1&var2=..., et vue qu'on accepte pas 
        //les ' ni ", preg_split s'arrêtra à la fin du lien qui est dans la balise <a href="ici">
        $lien_type=preg_split("#(https?://[a-z0-9-_./?&%:;=]+)#i",$page,null,PREG_SPLIT_DELIM_CAPTURE);
        $liensdelapage="";

        //on va enregistrer les liens qu'on va enregistrer pour ne pas remettre le même
        $lesLiens=array();
        foreach($lien_type as $liens){
            //si c'est bien que preg_split à capturer, on va enregistrer dans le base des donnees
            if(preg_match("#^http#i",$liens)){
                $sql = "INSERT INTO table_url (url) VALUES ('$liens')";

                $sql = "INSERT INTO `table_url`(`url`) VALUES (:liens)";
                $res = $pdo->prepare($sql);
                $exec = $res->execute(array(":liens"=>$liens));
                
                //si on la pas déjà enregistrer, on l'enregistre
                if(!in_array($liens,$lesLiens)){
                        $liensdelapage.=$liens."\n";
                        //pour ne pas l'enregistrer une deuxième fois
                        $lesLiens[]=$liens; 
                        }
                    }
                }
            }

?>
 <h1>Liste des utilisateurs</h1>
 <table>
   <thead>
     <tr>
       <th>ID des liens </th>
       <th>Listes de liens enregistrer</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php
          //Recuperation de l'id pour afficher dans le tableau 
          echo htmlspecialchars($row['id']);
         ?></td>
       <td><?php
          //Recuperation de l'url pour afficher dans le tableau 
          echo htmlspecialchars($row['url']); 
        ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>