<?php

function download_problem($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return $headers['http_code'];
}


if(isset($_POST)){
  $url = "http://127.0.0.1:5000/?link=". $_POST['pdf_problem_link'];
  $check_url_status = download_problem($url);
  if ($check_url_status == '200'){
     $download_pdf_success = true;
     echo "Done";
  }
  else{
     $download_pdf_error = "<strong>Please activate the API:</strong> <br> <code>python3 ~/codecourses/back/python-api/app.py</code>";
    echo $download_pdf_error;
  }
}