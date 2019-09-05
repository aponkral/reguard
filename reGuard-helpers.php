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

if (!defined("Aponkral_reGuard")) {
	http_response_code(403);
	echo "This file cannot be accessed directly. This system was made by APONKRAL.";
	exit();
}

// Functions
function reGuard_get_template($name) {
	global $reGuard;
	return file_get_contents($reGuard['dir'] . "/templates/reGuard-".$name.".tpl");
}

?>