<?php

$errors_array = [];

if(isset($_POST['submit'])){
    require "process_submission.php";
}

?>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
	
	<table width="100%" cellspacing="4" cellpadding="2" border="0">
	<tbody>
	<tr>
	<td style="vertical-align : top;" width="15%">Paste your code...</td>
	<td width="70%">
		<textarea name="code" rows="20" cols="60"><?php
            if($errors_array) echo htmlentities($code);
            ?></textarea>
	</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td width="15%">...or upload it</td>
	<td width="70%">
		<input type="file" name="my_file">
	</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td width="15%">&nbsp;</td>
	<td width="70%"><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;<input type="reset" value="Reset form"></td>
	<td>&nbsp;</td>
	</tr>
	</tbody></table>
</form>

