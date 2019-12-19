
  <?php 

   
  $servername = "192.168.5.13";
   $username = "";
   $password = "";
   $dbname = "snir_inventaire";

   $conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error)
   {
       die("echeque de la connection : ".$conn->connect_error);
   }


  //if (isset($_POST['APPAREIL'], $_POST['MARQUE'],  $_POST['MODELE'],  $_POST['FONCTION']))
  

     $APPAREIL=$_POST['APPAREIL'];
     $MARQUE=$_POST['MARQUE'];
     $MODELE=$_POST['MODELE'];
     $FONCTION=$_POST['FONCTION'];
     $carac_1=$_POST['carac_1'];
     $carac_2=$_POST['carac_2'];
     $carac_3=$_POST['carac_3'];
     $carac_4=$_POST['carac_4'];
     $carac_5=$_POST['carac_5'];
     $salle=$_POST['salle'];


     
  $sql = "INSERT INTO inventaire (nom_appareil,marque,modele,fonction,id_salle,carac_1,carac_2,carac_3,carac_4,carac_5) VALUES ('$APPAREIL','$MARQUE','$MODELE','$FONCTION','$salle','$carac_1','$carac_2','$carac_3','$carac_4','$carac_5')";
    
  if ($conn->query($sql)===TRUE)
    {
        echo "<br>Nouvel enregistrement reussi <br>";
    }else{
        echo "Erreur : ".$sql."<br>".$conn->error;
    }

  
    $conn->close();

?>
<meta http-equiv="refresh" content="00.1;index.php"/>
