<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

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
$app->get('/admin', function() {
	$page = new PageAdmin();
	$page->setTpl('index');
});

$app->run();