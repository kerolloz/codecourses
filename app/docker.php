<?php
exec("docker run --rm ubuntu bash -c 'ls'", $out, $ret);
print_r($out);
print_r($ret);