<?php
    if (isset($_GET["user"])) {
        $user = $_GET["user"];
        $headers = ['User-Agent: estalaPaul'];
        $userCh = curl_init();

        curl_setopt($userCh, CURLOPT_URL, "https://api.github.com/users/$user");
        curl_setopt($userCh, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($userCh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($userCh, CURLOPT_USERPWD, "{$_ENV['GH_CLIENT_ID']}:{$_ENV['GH_CLIENT_SECRET']}");
        curl_setopt($userCh, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $profile = curl_exec($userCh);
        curl_close($userCh);
        echo $profile;
    }
?>
