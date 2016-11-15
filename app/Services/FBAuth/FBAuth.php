<?php
namespace App\Services\FBAuth;
use Facebook;
use Facebook\FacebookApp;


class FBAuth{
    public function auth()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '{377416752598790}', // Replace {app-id} with your app id
            'app_secret' => '{4b5386c673b061e43ff18932023403f6}',
            'default_graph_version' => 'v2.8',
        ]);

        $helper = $fb->getRedirectLoginHelper();
//        var_dump($helper);
        $permissions = ['email'];
            $url2 = 'https://graph.facebook.com//oauth/access_token?
client_id=377416752598790
&redirect_uri=http://mysite.com/fb-callback
&client_secret=4b5386c673b061e43ff18932023403f6
&code=AQDXE1CeMJqeaFF0aWmIddNuwExHoIzseuHJL8zQbD14ivb0ZBln7wiJ2Fk8eXYjGQbitMn9BbqtIHP2imLd3WdEei491Y5s4JZQc4x1C0f0di0xc0W4xgUjuu0KB3jWuQdy39yMo53kIKfUuLZFF3xbo3EOgD_FDbm6ESOREBCLFBcaNDvH-ccSLkwyFnTy63yIs30RdY41V0X1WW4J5Op2CQ1en4VpoOEJSQkVD4k7bD9XWKBlxQ8AxUdoC-ffv_veaMjiE3PBQyy9XOnVJQSG-qnd4UHVaQQWpjR0JHlc9RTvFZs0HC-69omBfPvKuvA0wuxc79wNOLBUhajTO-eW#_=_';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([], null, '&'));
        $ret = curl_exec($ch);
        curl_close($ch);
        echo $ret;
        // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://mysite.com/fb-callback',$permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a><br>';
        echo '<a href="https://www.facebook.com/v2.8/dialog/oauth?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback">Log in with Facebook!</a>';
    }

    public function callBack()
    {

    }
}

$url2 = 'https://graph.facebook.com//oauth/access_token?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback&client_secret=4b5386c673b061e43ff18932023403f6&code=AQCcYFKiEn5yXOfhIGeGuZm7_yf3-7BR3mw1Kk7eqM87zJ4mnwm0OTRoJrk4P3qOXRb4FCA_4U8sSwtjA5s95YYABdBml_hyfPfGx_27dUWKMnulHIuLpGTIs_Vb-bXXx39pULTr85lUbI0z17JC1SfCM8sC4F5p7H28fyxyWEHsMh_ZQ_vYmhpjQLpvCkYXm10kmROeO9s44J6jLNq46GbuTeSgNTmrU0-tux1K99gKM_-rFx57eCIK2LEQUVOOSvKLJPJB4y_-u6V_vAm0AKjiPEzKcaXSUFG4zZWuXqQNpMLm25TkAzocZasOGM0phApkG8ZDv49IfzhccyKiUeJP#_=_';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([], null, '&'));
$ret = curl_exec($ch);
curl_close($ch);
var_dump($ret);
//echo "$url2.<br>";

