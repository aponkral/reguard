<?php
/**
	* reGuard
	*
	* Turkish: Web sitenizi reGuard ile koruyun.
	* English: Protect your website with reGuard.
	* Version: 1.0.1 (1.0.1release.1)
	* BuildId: 20190904.001
	* Build Date: 05 Sep 2019
	* Email: bilgi[@]aponkral.net
	* Website: https://aponkral.net
	*
*/
// Her şeyi sana yazdım!.. Her şeye seni yazdım!.. *Mustafa Kemal ATATÜRK

if (!defined("Aponkral_reGuard")) {
	http_response_code(403);
	echo "This file cannot be accessed directly. This system was made by APONKRAL.";
	exit();
}

$reGuard['dir'] = __DIR__;
include_once $reGuard['dir'] . "/reGuard-helpers.php";

// Türkçe: Ne yaptığınızı bilmiyorsanız lütfen yukarıdaki kodlarda değişiklik yapmayın.

// English: Please do not make changes to the above codes if you do not know what you are doing.

$reGuard['rate']['active'] = "minute";	// only "hour", "minute" and "second"
$reGuard['rate']['per_hour'] = 18000;	// Rate limiting in hour
$reGuard['rate']['per_minute'] = 300;	// Rate limiting in minute
$reGuard['rate']['per_second'] = 5;	// Rate limiting in second

$reGuard['block']['time'] = 300;	// Block time in seconds

$reGuard['site_url'] = "https://aponkral.net/";	// Site url ending with slash (/)
$reGuard['reGuard_url'] = "https://aponkral.net/reGuard/";	// reGuard url ending with slash (/)

$reGuard['reCaptcha']['sitekey'] = "";	// reCaptcha site key
$reGuard['reCaptcha']['secretkey'] = "";	// reCaptcha secret key

?>