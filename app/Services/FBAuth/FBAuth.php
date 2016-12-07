<?php
namespace App\Services\FBAuth;
use App\Controllers\AuthController;
use Facebook;
use Facebook\FacebookApp;


class FBAuth{
    public function auth()
    {
//        $fb = new Facebook\Facebook([
//            'app_id' => '{377416752598790}', // Replace {app-id} with your app id
//            'app_secret' => '{4b5386c673b061e43ff18932023403f6}',
//            'default_graph_version' => 'v2.8',
//        ]);
//
//        $accessToken = '';
//        $if = false;
//        if ($if){
//            $url2 = 'https://graph.facebook.com//oauth/access_token?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback&client_secret=&code=AQAUFt4ONbefKSI6bVSAlHlAzBMzgrkDACiKauC-bF3Vo9ugp_K1IYpaLGnXpQSXB_ypQXlxzxvngP7-7CQd1PO6AVGT8fBedNOrkfRwQ3g7vss2IV4ROsxAOcsJtX8HCgpnre-nS1JvuCN-dL3eZvthqb5oUfVNWq6gHuFFqNjf8tS3K1CimIJUFgcXIhES0fqizaPnvCPi5ME_JGGW1edmK4d2ilD8cGaMLBwpCeESx2ZN2GeSBlcfExzSHvBrN5qUZsY_9S92n0VHgEkpgyhIVShZl7r5KqQzMKSm5sXmreHutJ213OZpIkLHyznVJ7W89mg-B4QZQ5RUdVbG9VhE#_=_';
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url2);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([], null, '&'));
//            $ret = curl_exec($ch);
//            curl_close($ch);
//            echo $ret;
//            $seter = $ret;
//            var_dump($seter);
//            // Optional permissions


    }

    }