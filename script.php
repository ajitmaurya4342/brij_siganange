<?php
header('Content-Type: application/json; charset=utf-8');
include("constant.php");
$data = json_decode(file_get_contents("php://input"));

@$cinema_id = $data->cinema_id;
@$display_id = $data->display_id;
@$screen_size = $data->screen_width;
@$checkDisplaySize = $data->checkDisplaySize;

$data_array = array(
    "cinema_id" => $cinema_id,
    "movie_length" => $MOVIE_LENGTH,
    "display_id" => $display_id,
    "token" => $token,
    "s3UrlImage" => $s3UrlImage,
);

$schedule_array = [];
$video_array = [];
$image_array = [];
$is_horizontal = true;
$timer = 5000;
$isBlackTheme = false;
$orientation_type_is_horizontal=true;
$data_created=[];
 $data = getData($baseurl, $data_array, "/api/signage/get-signage-data");

    if(isset($data["data"])){

    if (count($data["data"]) > 0)
    {
       $data_created = $data["data"][0];
        $timer = $data_created["timerSecond"] * 1000;
        $schedule_array = $data_created["scedule_movie_array"];
        $video_array = $data_created["video_array_new"];
        $image_array = $data_created["image_array"];
    }
    }

 ob_start();
 if($screen_size<$checkDisplaySize){
include "potrait.php";

 }else{
include "landscape.php";

 }
$myvar = ob_get_clean();

  
$array_1=array(
    "msg"=>"dsad",
    "Records"=> [$data_created],
     "data_html" =>$myvar 
  
);
echo json_encode($array_1);

?>
