<?php

include('app/app.php');
$customparams = loadCustomParams($c,decryptCookie($_COOKIE['oauth_consumer_key']));

$variables = array(
		'c' => $c,
                'customparams' => $customparams
	);

ebsco_render('import_folder.html', 'layout.html', $variables);

?>
