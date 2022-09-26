<?php
/*echo "<pre>";
print_r($_FILES);
exit();*/
include_once("../../app/v1/connection-branch-admin.php");
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://ocrserver.centralindia.cloudapp.azure.com:8000/api/v1/ocr/cheque/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('file'=> new CURLFILE($_FILES['file']['tmp_name'])),
));

$response = curl_exec($curl);
if($response){
  echo $response;
}else{
  swalToast("warning", "Something went wrong try again!");
}

curl_close($curl);
