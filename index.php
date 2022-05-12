<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();
$app->config('debug', true);

/** 
 * ROTAS SITE
*/
$app->get('/', function() {
	$page = new Page();
	$page->setTpl('index');
});

/** 
 * ROTAS ADMIN
*/
$app->get('/login', function() {
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl('login');
});
$app->get('/admin', function() {
	$page = new PageAdmin();
	$page->setTpl('index');
});

$app->post('/login', function(){
	User::login($_POST["deslogin"], $_POST['despassword']);

	header("Location: /admin");
	exit;
});

$app->run();