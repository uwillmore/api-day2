<?php
  $url = "https://accounts.google.com/o/oauth2/auth";



  $params = array(
    "response_type" => "code",
    "client_id" => "733929298649-a32ahoj5jio55csf1svs3et5sftvgi4n.apps.googleusercontent.com",
    "redirect_uri" => "http://localhost/oauth2callback.php",
    "scope" => "https://www.googleapis.com/auth/plus.me"
  );
  
  $request_url = $url . "?". http_build_query($params);

  header("Location: ".$request_url);

 ?>
