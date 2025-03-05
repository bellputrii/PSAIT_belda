<?php

if(isset($_POST['submit']))
{    

$nama_daerah = $_POST['nama_daerah'];
$lagu_daerah = $_POST['lagu_daerah'];
$id_daerah = $_POST['id_daerah'];


//Pastikan sesuai dengan lagu_daerah endpoint dari REST API di ubuntu
$url='http://10.33.102.172/tugas/namaDaerah_api.php?id_daerah='.$id_daerah.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
    'nama_daerah' =>  $nama_daerah,
    'lagu_daerah' =>  $lagu_daerah,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 echo "<br>Sukses mengupdate data di ubuntu server !";
 echo "<br><a href=selectDaerahView.php> OK </a>";
}
?>

 