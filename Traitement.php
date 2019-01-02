<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=PFA3 user=postgres password=postgres");



pg_query($dbconn, "INSERT INTO public.epaves (longitude,latitude,nom,taille,nationalite,type,profondeur) VALUES ('".$_GET['Long']."', '".$_GET['Lat']."','".$_GET['Nom']."','".$_GET['taille']."','".$_GET['nat']."','".$_GET['type']."','".$_GET['prof']."')");


if($_GET['taille']==''){
pg_query($dbconn, "UPDATE public.epaves SET taille ='inconnue' WHERE nom='".$_GET['Nom']."'");
}
if($_GET['nat']==''){
pg_query($dbconn, "UPDATE public.epaves SET  nationalite = 'inconnue' WHERE nom='".$_GET['Nom']."'");
}
if($_GET['type']==''){
pg_query($dbconn, "UPDATE public.epaves SET type =' inconnue' WHERE nom='".$_GET['Nom']."'");
}
if($_GET['prof']==''){
pg_query($dbconn, "UPDATE public.epaves SET profondeur = 'inconnue' WHERE nom='".$_GET['Nom']."'");
}











pg_query($dbconn, "COPY public.epaves(nom,latitude,longitude,taille,nationalite,type,profondeur) TO 'C:\\xampp\\htdocs\\PFA3\\epaves.csv' DELIMITER ';' CSV HEADER" );


header("location:index.html");

?>