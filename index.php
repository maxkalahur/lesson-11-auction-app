<?php
//
/*
13.	 OOP
	+	������ OOP
	+	OOP & PHP
	+	������� ������� ��������������

14.	 ����������� ����������
	+	������������ ������
	+	Namespaces
	+	MVC
	+	���������, ��������, ���������
	+	Composer
	+	Traits
http://php.net/manual/ru/language.oop5.php
*/

use \PHPMailer as PHPMailer;
use Facebook\Facebook;
use App\Database\DB;
use App\App;
use App\Models\User;

define('APP_MODE', 'DEBUG');

require __DIR__ . '/vendor/autoload.php';


(new App())->run();

$user = new User();
$db = DB::init(1,2,3,4);
$mailer = new PHPMailer();
$fb = new Facebook([
  'app_id' => '{app-id}',
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v2.5',
]);

var_dump($user);
var_dump($db);
var_dump($mailer);
var_dump($fb);



