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

define("Aponkral_reGuard", true);
require_once __DIR__ . '/vendor/google/recaptcha/src/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Flintstone\Flintstone;
use Flintstone\Formatter\JsonFormatter;

$reGuard['client_ip'] = sha1(md5($_SERVER['REMOTE_ADDR']));

// Load a database
$reGuard_ips = new Flintstone('ips', ['dir' => __DIR__ . '/database/', 'ext' => '.txt', 'gzip' => false, 'formatter' => new JsonFormatter()]);

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	http_response_code(403);
	echo "This file cannot be accessed directly. This system was made by APONKRAL.";
	exit();
}


if (!empty($_POST)) {
	if (!isset($_POST['g-recaptcha-response'])) {
		http_response_code(403);
		echo "ReCaptcha is not set.";
		exit();
	}

	include_once __DIR__ . "/reGuard-config.php";
	$reGuard_recaptcha = new \ReCaptcha\ReCaptcha($reGuard['reCaptcha']['secretkey'], new \ReCaptcha\RequestMethod\CurlPost());
	$reGuard_recaptcha_resp = $reGuard_recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
	if ($reGuard_recaptcha_resp->isSuccess()) {
		$reGuard['last_call'] = (isset($reGuard_ips->get($reGuard['client_ip'])['last_call'])) ? $reGuard_ips->get($reGuard['client_ip'])['last_call'] : 0;
			$reGuard_ips->set($reGuard['client_ip'], ["last_call" => $reGuard['last_call'], "blocked" => false, "blocking_end" => 0, "note" => "IP unblocked with reCaptcha verification."]);
			if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
				header("Location: ".$_SERVER['HTTP_REFERER']);
			else
				header("Location: ".$reGuard['site_url']);
	} else {
		http_response_code(403);
		echo "reCaptcha incorrect";
	}
}
?>