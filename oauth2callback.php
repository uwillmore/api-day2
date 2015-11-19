<?php


if(isset($_GET['code'])){
  print $_GET['code'];

  $code = $_GET['code'];

  $params = array(
      "code" => $code,
      "client_id" => "733929298649-a32ahoj5jio55csf1svs3et5sftvgi4n.apps.googleusercontent.com",
      "client_secret" => "SPPpUr3mzWNhG8kyYTLqro-N",
      "redirect_uri" => "http://localhost/oauth2callback.php",
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



  print "<pre>".print_r(json_decode($resp), true)."</pre>";
  // Close request to clear up some resources
  curl_close($curl);
  $r = json_decode($resp);
  $token = $r->access_token;
  //   https://www.googleapis.com/auth/calendar
  //   /users/me/calendarList

  $params = array(
      "code" => $code,
      "client_id" => "733929298649-a32ahoj5jio55csf1svs3et5sftvgi4n.apps.googleusercontent.com",
      "client_secret" => "SPPpUr3mzWNhG8kyYTLqro-N",
      "redirect_uri" => "http://localhost/oauth2callback.php",
      "grant_type" => "authorization_code"
  );


  $url ='https://www.googleapis.com/calendar/v3/users/me/calendarList?access_token='.$token;

  $ch = curl_init();

  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false);

  $output=curl_exec($ch);
  print htmlspecialchars($output);
  curl_close($ch);


  print "<br/><br/>";
  $obj = json_decode($output);


  print "<pre>".print_r($obj,true)."</pre>";









}
