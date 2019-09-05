<html>
<head>
	<title>[[reGuard_Title]]</title>
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
.recaptcha {
	text-align: center;
}
.g-recaptcha {
	display: inline-block;
	background: #ffffff;
	border-radius: 3px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	padding-right: 10px;
}
.submit-button {
margin-top: 5px;
margin-bottom: 5px;
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
	margin-top: 200px;
	margin-bottom: 10px;
}
</style>
</head>
<body>
	<div class="top-text">
		<h1>[[reGuard_page_title]]</h1>
		<hr style="width: 100%; height: 1px; background-color: #EEEEEE; border-radius: 10px;">
	</div>
	<div class="recaptcha">
		<form name="recaptcha-form" method="post" action="[[reGuard_check_url]]">
		<div id="g-recaptcha-js" class="g-recaptcha" style="display: none;" data-sitekey="[[reGuard_reCaptcha_sitekey]]" data-callback="reCaptchaVerify"></div>
<noscript>
 	<div class="g-recaptcha">
		<iframe src="https://www.google.com/recaptcha/api/fallback?k=[[reGuard_reCaptcha_sitekey]]" frameborder="0" scrolling="no" style="width: 302px; height:422px; border-style: none;"></iframe>
		<div style="border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px; height: 60px; width: 300px;">
			<textarea id="g-recaptcha-response" name="g-recaptcha-response"style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;"></textarea>
		</div>
	</div>
	<div class="submit-button"><button type="submit" style="background-color: #4CAF50; border: none; color: white; padding: 5px 11px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; border-radius: 25px;">Gönder</button></div></noscript>
		</form>
	</div>
	<div class="bottom-text">
		<hr style="width: 100%; height: 1px; background-color: #EEEEEE; border-radius: 10px;">
		[[reGuard_page_description]]
	</div>
	
	<div class="footer-text">
		[[reGuard_footer_text]]
	</div>

<script src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">
function reCaptchaVerify(response) {
	if (response === document.querySelector('.g-recaptcha-response').value) {
		document.forms['recaptcha-form'].submit();
	}
}
document.getElementById("g-recaptcha-js").style.display = "";
</script>
</body>
</html>