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

// Türkçe: Ne yaptığınızı bilmiyorsanız lütfen aşağıdaki kodlarda değişiklik yapmayın.

// English: Please do not make changes to the following codes if you do not know what you are doing.

define("Aponkral_reGuard", true);
include_once __DIR__ . "/reGuard-config.php";

$reGuard['rate']['hour_time'] = 3600;
$reGuard['rate']['minute_time'] = 60;
$reGuard['rate']['second_time'] = 1;

require_once $reGuard['dir'] . '/vendor/autoload.php';
use Flintstone\Flintstone;
use Flintstone\Formatter\JsonFormatter;

$reGuard['client_ip'] = sha1($_SERVER['REMOTE_ADDR']);

// Load a database
$reGuard_ips = new Flintstone('ips', ['dir' => $reGuard['dir'] . '/database/', 'ext' => '.txt', 'gzip' => false, 'formatter' => new JsonFormatter()]);

$reGuard['curr_time'] = round(intval(str_replace('.', '', microtime(true))) / 10);

	if (isset($reGuard_ips->get($reGuard['client_ip'])['blocked']) && isset($reGuard_ips->get($reGuard['client_ip'])['blocking_end'])) {
	if ($reGuard_ips->get($reGuard['client_ip'])['blocked'] == true && $reGuard_ips->get($reGuard['client_ip'])['blocking_end'] >= $reGuard['curr_time']) {
		include_once $reGuard['dir'] . "/reGuard-recaptcha.php";
		exit();
	}
	}

	if (isset($reGuard_ips->get($reGuard['client_ip'])['last_call'])) {
		
		$reGuard['last'] = $reGuard_ips->get($reGuard['client_ip'])['last_call'];
		$reGuard['sec'] = abs($reGuard['last'] - $reGuard['curr_time']);
		
		$reGuard['rate_per_time'] = ($reGuard['rate'][$reGuard['rate']['active'].'_time'] / $reGuard['rate']['per_'.$reGuard['rate']['active']] * 1000);
		
		if ($reGuard['sec'] <= $reGuard['rate_per_time']) {
			$reGuard_ips->set($reGuard['client_ip'], ["last_call" => $reGuard['curr_time'], "blocked" => true, "blocking_end" => ($reGuard['curr_time'] + ($reGuard['block']['time'] * 1000)), "note" => "Blocked by Rate Limit for ".$reGuard['block']['time']." seconds."]);
			include_once $reGuard['dir'] . "/reGuard-blocked.php";
			exit();
		}
	}
	
	$reGuard['blocking_end'] = (isset($reGuard_ips->get($reGuard['client_ip'])['blocking_end'])) ? $reGuard_ips->get($reGuard['client_ip'])['blocking_end'] : 0;

	if ($reGuard['blocking_end'] <= $reGuard['curr_time']) {
$reGuard_ips->set($reGuard['client_ip'], ["last_call" => $reGuard['curr_time'], "blocked" => false, "blocking_end" => 0, "note" => "Standart changes"]);
	}

?>