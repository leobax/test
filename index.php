<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>inventaire</title>  
	<link rel="stylesheet" href="style.css"/>  
</head>

<body>
   <article class=main>
   <h1 style="text-align:center;">inventaire SNIR</h1>

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

//tableau
    $sql = "SELECT nom_appareil, marque, modele, fonction, nom_salle,carac_1,carac_2,carac_3,carac_4,carac_5 FROM inventaire INNER JOIN salle ON inventaire.id_salle=salle.id_salle";
    $result = $conn->query($sql);
  
      if ($result->num_rows > 0){
          echo " 
          <table>
    <thead>
        <tr>
            <th colspan='2'>INVENTAIRE</th>
             </tr>
             </thead>
            <tr><td>APPAREIL</td> 
            <td>MARQUE</td>
            <td>MODELE</td>
            <td>FONCTION</td>
            <td>SALLE</td>
            <td>CARAC 1</td>
            <td>CARAC 2</td>
            <td>CARAC 3</td>
            <td>CARAC 4</td>
            <td>CARAC 5</td>

            <tbody></tr>";
          while($row=$result->fetch_assoc()){
              echo "<tr><td>".$row["nom_appareil"]." <td>".$row["marque"]." <td>".$row["modele"]." <td>".$row["fonction"]." <td>".$row["nom_salle"]." <td>".$row["carac_1"]." <td>".$row["carac_2"]." <td>".$row["carac_3"]." <td>".$row["carac_4"]." <td>".$row["carac_5"]." </td></tr>";

    }
    echo " </tbody></table>";
      }else {echo "0 result";}

$conn->close();
?>
<br><br><br>
<fieldset><legend>nouvelle entre</legend>
   <form method="post" action="savebd.php">
   <label for="APPAREIL">nom de APPAREIL :</label><input type="text" name="APPAREIL" id="APPAREIL" placeholder="APPAREIL" size="30"  /><br/><br/>
   <label for="MARQUE">nom de la MARQUE :</label><input type="text" name="MARQUE" id="MARQUE" placeholder="MARQUE" size="30"  /><br/><br/>
   <label for="MODELE">nom du MODELE :</label><input type="text" name="MODELE" id="MODELE" placeholder="MODELE" size="30"  /><br/><br/>
   <label for="FONCTION">FONCTION :</label><input type="text" name="FONCTION" id="FONCTION" placeholder="FONCTION" size="30"  /><br/><br/>
   <?php //<label for="SALLE">SALLE :</label><input type="text" name="SALLE" id="SALLE" placeholder="SALLE" size="30"  /><br/><br/>
   ?>
   <label for="carac_1">caractéristique 1 :</label><input type="text" name="carac_1" id="carac_1" placeholder="carac_1" size="30"  /><br/><br/>
   <label for="carac_2">caractéristique 2 :</label><input type="text" name="carac_2" id="carac_2" placeholder="carac_2" size="30"  /><br/><br/>
   <label for="carac_3">caractéristique 3 :</label><input type="text" name="carac_3" id="carac_3" placeholder="carac_3" size="30"  /><br/><br/>
   <label for="carac_4">caractéristique 4 :</label><input type="text" name="carac_4" id="carac_4" placeholder="carac_4" size="30"  /><br/><br/>
   <label for="carac_5">caractéristique 5 :</label><input type="text" name="carac_5" id="carac_5" placeholder="carac_5" size="30"  /><br/><br/>

   <?php
   $conn= new mysqli($servername,$username,$password,$dbname);

   if ($conn->connect_error)
   {
       die("echeque de la connection : ".$conn->connect_error);
   }

   $sql = "SELECT * FROM salle ";
    $result = $conn->query($sql);
  
      if ($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
            echo " <input type='radio' name='salle' value='".$row["id_salle"]."' id='salle'/>
            <label for='".$row["nom_salle"]."'>".$row["nom_salle"]."</label>";
        }}

        $conn->close();

          ?>
   <br><br>
   <input type="submit" value="envoyer"/>
   <input type="reset" value="effacer"/>
   </form>

   </fieldset>

 </article>

<nav>
    
    <p > 
    <form style="text-align:center;" method="post" action="">
        <input type="search" id="search" name="q"/>  
        <input type="submit" value="recherche"/>
    </form>
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
  
      $sql = "SELECT nom_appareil, marque, modele, fonction, nom_salle,carac_1,carac_2,carac_3,carac_4,carac_5 FROM inventaire INNER JOIN salle ON inventaire.id_salle=salle.id_salle";
      $result = $conn->query($sql);
    
        if ($result->num_rows > 0){
            
            while($row=$result->fetch_assoc()){
                $str =$row["nom_appareil"].$row["marque"].$row["modele"].$row["fonction"].$row["nom_salle"].$row["carac_1"].$row["carac_2"].$row["carac_3"].$row["carac_4"].$row["carac_5"];


                echo '<br>'; 
$test =$_POST["q"];
$re = '/'.$test.'([a-z])*/';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

foreach($matches as $index => $val)
{
   print_r($matches[$index][0]);
   echo '<br>';   
}  
      } 
        }else {echo "0 result";}
  
  $conn->close();

?>
</p> </li>
<br><br>
</nav>
</body>
</html>