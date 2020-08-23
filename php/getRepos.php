<?php
    if (isset($_GET["user"])) {
        $user = $_GET["user"];
        $headers = ['User-Agent: estalaPaul'];
        $reposCh = curl_init();

        curl_setopt($reposCh, CURLOPT_URL, "https://api.github.com/users/$user/repos?per_page=5&sort=created:%20asc");
        curl_setopt($reposCh, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($reposCh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($userCh, CURLOPT_USERPWD, "{$_ENV['GH_CLIENT_ID']}:{$_ENV['GH_CLIENT_SECRET']}");
        curl_setopt($userCh, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $repos = curl_exec($reposCh);
        curl_close($reposCh);
        echo $repos;
    }
?>