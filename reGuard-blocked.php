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
http_response_code(403);

$reGuard['title'] = "Blocked by reGuard";
$reGuard['page_title'] = "Blocked by reGuard";
$reGuard['page_description'] = "Sistemimiz, IP adresinizde gelen sıra dışı bir trafik algıladı. İsteğiniz kabul edilmedi ve engellendi.";
$reGuard['footer_text'] = "reGuard <a href=\"https://aponkral.net/\" style=\"color: #EEEEEE\">Aponkral</a> tarafından ❤️ ile geliştirdi";

$reGuard['page'] = reGuard_get_template("blocked");

$reGuard['page'] = str_replace("[[reGuard_Title]]", $reGuard['title'], $reGuard['page']);
$reGuard['page'] = str_replace("[[reGuard_page_title]]", $reGuard['page_title'], $reGuard['page']);
$reGuard['page'] = str_replace("[[reGuard_page_description]]", $reGuard['page_description'], $reGuard['page']);
$reGuard['page'] = str_replace("[[reGuard_footer_text]]", $reGuard['footer_text'], $reGuard['page']);

echo $reGuard['page'];
?>