<?php
	error_reporting( E_ALL|E_STRICT );
	ini_set( 'display_errors', 1 );

	$response_json = "''";
	$access_token_as_json = "''";
	include 'controls/index_ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style>
html { font-family: sans-serif; font-size: 16px; line-height: 140%; }
body { padding: 3%; }
</style>
<title>microsoft.translator</title>
</head>
<body>
<h1>microsoft.translator</h1>
<script>var response_json = <?php echo $response_json; ?>,access_token_as_json = <?php echo $access_token_as_json; ?>;</script>
<script src="/js/com/jquery/jquery-1.11.1.js"></script>
<script src="js/translator/translator.js"></script>
<script src="js/app.js"></script>