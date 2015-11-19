<?php


if(isset($_GET['code'])){
  print $_GET['code'];

  $code = $_GET['code'];

  $params = array(
      "code" => $code,
      "client_id" => "733929298649-a32ahoj5jio55csf1svs3et5sftvgi4n.apps.googleusercontent.com",
      "client_secret" => "SPPpUr3mzWNhG8kyYTLqro-N",
      "redirect_uri" => "https://localhost/verified.php",
      "grant_type" => "authorization_code"
  );


  // Get cURL resource
  $curl = curl_init();
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => 'https://accounts.google.com/o/oauth2/token',

      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $params
  ));
  // Send the request & save response to $resp
  $resp = curl_exec($curl);


  print $resp;
  // Close request to clear up some resources
  curl_close($curl);





}
