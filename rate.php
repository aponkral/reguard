<?php
include_once "reGuard.php";
?>
<html>
<head>
	<title>reGuard Rate Limiting Test Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<link href="https://fonts.googleapis.com/css?family=Google+Sans&display=swap" rel="stylesheet">

<style>
body {
	background: linear-gradient(90deg, #00c6ff 10%, #0072ff 90%);
}
.top-text {
	font-family: 'Google Sans', sans-serif;
	color: #F5F5F5;
	text-align: center;
	margin-top: 65px;
	margin-bottom: 15px;
}
.bottom-text {
	font-family: 'Google Sans', sans-serif;
	color: #E0E0E0;
	text-align: center;
	margin-top: 15px;
	margin-bottom: 15px;
}
.footer-text {
	font-family: 'Google Sans', sans-serif;
	color: #FAFAFA;
	text-align: center;
	margin-top: 300px;
	margin-bottom: 10px;
}
</style>
</head>
<body>
	<div class="top-text">
		<h1>reGuard</h1>
		<hr style="width: 100%; height: 1px; background-color: #EEEEEE; border-radius: 10px;">
	</div>
	<div class="bottom-text">
		3 saniyede maksimum 1 istek gönderebilirsiniz. Denemek için 3 saniyeden daha kısa sürelerde sayfayı yenileyin.
	</div>
	
	<div class="footer-text">
		reGuard <a href="https://aponkral.net/" style="color: #EEEEEE">Aponkral</a> tarafından ❤️ ile geliştirdi
	</div>
</body>
</html>