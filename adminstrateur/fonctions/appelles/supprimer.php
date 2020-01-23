<?php
 require "../../../class/appelles.php";
 $appel_supprime=new Appelle();
 $appel_supprime->id=$_POST["id"];
 $appel_supprime->supprimer_appel();
 echo $appel_supprime->id;