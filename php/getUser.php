<?php
	if (isset($_GET["user"])) {	
		$user = $_GET["user"];
		$config = parse_ini_file('routetoconfigfile');
		$header = $config['header'];
		$headers = [
			$header
		];
		$userCh = curl_init();

		curl_setopt($userCh, CURLOPT_URL, 'https://api.github.com/users/'.$user.'?client_id='.$config['clientId'].'&client_secret='.$config['clientSecret']);
		curl_setopt($userCh, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($userCh, CURLOPT_RETURNTRANSFER, true);
		$profile = curl_exec($userCh);
		echo $profile;
	}
?>
