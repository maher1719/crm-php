<?php
require "../../class/prospect.php";
require "../../class/contact.php";
 $prospect_supprime=new prospect();
 $prospect_supprime->id=$_POST["id"];
 $prospect_supprime->supprimer_prospect();
 echo $prospect_supprime->id;
 $contact=new Contact();