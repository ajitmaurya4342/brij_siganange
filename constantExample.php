<?php
$header="Welcome to Empire Cinemas";
$token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbiI6IjdlN2IzZWFiLTJlOTEtNDkzOS05ZjBmLTdmMzQyODJmZTZjYSIsImlhdCI6MTY1OTk0MzkxM30.qpq-sdSPtmXu2vHdv4EYembuqM_VaFZdtuCmMI4jhGQ";
// $baseurl="https://brij-api-v1.empirecinemas.com";
$baseurl="http://localhost:3800";
$s3UrlImage="https://s3.me-south-1.amazonaws.com/images.brijimages.com/";
$MOVIE_LENGTH=4;
function getData($baseurl,$data_array,$url){
 $curl = curl_init();

    $qs = '';
    foreach ($data_array as $par => $value) {
        $qs = $qs . "$par=" . urlencode($value) . "&";
    }
   
    $uri = "$baseurl$url?$qs";
   
    curl_setopt_array($curl, array(
    CURLOPT_URL => $uri,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response,true);
}


?>