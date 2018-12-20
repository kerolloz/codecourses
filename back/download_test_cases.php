<?php

if (isset($_POST)) {
	$link = $_POST['submission_link'];
	$command = "python3 ../back/submissions.py " . $link;
	exec($command , $out, $ret);
	if($ret == 0):
		$download_test_cases_submission_folder_name = $out[0];
		echo "Done, " . $download_test_cases_submission_folder_name;
	else:
		echo $out[0];
	endif;
}
