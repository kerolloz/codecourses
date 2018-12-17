<?php

$link = $_POST['submission_link'];
$command = "python3 ../back/submissions.py " . $link;
exec($command , $out, $ret);
if($ret == 0):
	$download_test_cases_submission_folder_name = $out[0];
else:
	$download_test_cases_error = $out[0];
endif;