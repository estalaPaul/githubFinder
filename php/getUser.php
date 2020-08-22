<?php
    if (isset($_GET["user"])) {
        $user = $_GET["user"];
        $headers = ['User-Agent: estalaPaul'];
        $userCh = curl_init();
        $url = sprintf(
            'https://api.github.com/users/%s?client_id=%s&client_secret=%s',
            $user,
            $_ENV['GH_CLIENT_ID'],
            $_ENV['GH_CLIENT_SECRET']
        );

        curl_setopt($userCh, CURLOPT_URL, $url);
        curl_setopt($userCh, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($userCh, CURLOPT_RETURNTRANSFER, true);
        $profile = curl_exec($userCh);
        echo $profile;
    }
?>
