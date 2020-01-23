 <?php
 require "../../../class/contact.php";
 $contact_supprime=new Contact();
 $contact_supprime->id=$_POST["id"];
 $contact_supprime->supprimer_contact();
 echo $contact_supprime->id;