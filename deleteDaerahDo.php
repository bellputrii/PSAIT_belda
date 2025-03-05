<?php

$id_daerah = $_GET['id_daerah'];

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://10.33.102.172/tugas/namaDaerah_api.php?id_daerah='.$id_daerah.'';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 //
echo "<br>Sukses menghapus data di ubuntu server !";
echo "<br><a href=selectDaerahView.php> OK </a>";

?>