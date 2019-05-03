<?php
	if (isset($_GET["user"])) {	
		$user = $_GET["user"];
		$config = parse_ini_file('routetoconfigfile');
		$header = $config['header'];
		$headers = [
			$header
		];
		$reposCh = curl_init();
		curl_setopt($reposCh, CURLOPT_URL, 'https://api.github.com/users/'.$user.'/repos?per_page='.$config['reposCount'].'&sort='.$config['reposSort'].'&client_id='.$config['clientId'].'&client_secret='.$config['clientSecret']);
		curl_setopt($reposCh, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($reposCh, CURLOPT_RETURNTRANSFER, true);
		$repos = curl_exec($reposCh);
		curl_close($reposCh);
		echo $repos;
	}
?>