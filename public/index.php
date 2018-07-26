<?php

// login vars

// $use_uc_password!='monolith';

// 	if($use_uc_password!=''){ // pass

// 		$gateway = "Pages under construction. Enter client login : <form action=\"index.php\" method=\"get\"><input id=\"uce\" name=\"uce\" type=\"text\" /></form>";

// 		if(isset($_GET['uce'])){

// 			if($_GET['uce']==$use_uc_password){
// 				setcookie("uce", $use_uc_password);
// 			}else{
// 				setcookie("uce", '');
// 				echo $gateway;
// 				die;
// 			}

// 		}else{

// 			if (isset($_COOKIE["uce"])){

// 				if($_COOKIE["uce"]==$use_uc_password){
// 					// pass
// 					setcookie("uce", $use_uc_password);
// 				}else{
// 					echo $gateway;
// 					die;
// 				}

// 			}else{
// 				echo $gateway;
// 				die;
// 			}

// 		}

// 	} // usepass end

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
