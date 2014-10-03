<?php
	error_reporting( E_ALL|E_STRICT );
	ini_set( 'display_errors', 1 );

	$response_json = "''";
	$access_token_as_json = "''";
	include 'index_ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style>
html { font-family: sans-serif; font-size: 16px; line-height: 140%; }
body { padding: 3%; }
.error { color: #a94442; }
</style>
<title>microsoft.translator</title>
</head>
<body>
<h1>microsoft.translator</h1>
<script>var response_json = <?php echo $response_json; ?>, access_token_as_json = <?php echo $access_token_as_json; ?>;</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/microsoft.translator.js"></script>
<script src="js/translator.js"></script>