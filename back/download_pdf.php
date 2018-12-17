<?php

function check_url($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return $headers['http_code'];
}

function download_problem($url){

	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => $url,
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
}


$url = "http://127.0.0.1:5000/?link=". $_POST['pdf_problem_link'];
$check_url_status = check_url($url);
if ($check_url_status == '200'){
   download_problem($url);
   $download_pdf_success = true;
}
else
   $download_pdf_error = "Please activate the api server: python3 ~/codecourses/back/python-api/app.py";

