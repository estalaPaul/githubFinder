<?php
    if (isset($_GET["user"])) {
        $user = $_GET["user"];
        $headers = ['User-Agent: estalaPaul'];
        $reposCh = curl_init();
        $url = sprintf(
            'https://api.github.com/users/%s/repos?per_page=5&sort=created:%20asc&client_id=%s&client_secret=%s',
            $user,
            $_ENV['GH_CLIENT_ID'],
            $_ENV['GH_CLIENT_SECRET']
        );
        curl_setopt($reposCh, CURLOPT_URL, $url);
        curl_setopt($reposCh, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($reposCh, CURLOPT_RETURNTRANSFER, true);
        $repos = curl_exec($reposCh);
        curl_close($reposCh);
        echo $repos;
    }
?>