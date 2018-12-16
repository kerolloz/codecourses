<?php

$link = $_POST['submission_link'];
$command = "python3 submissions.py " . $link;
exec($command , $out, $ret);
print_r($out);
echo $ret;