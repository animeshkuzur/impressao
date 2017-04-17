<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});
*/

//Route::group(['middleware' => 'web'], function () {
	Route::get('/',['as' => 'home','uses' => 'HomeController@index']);
	Route::post('/getprice',['as' => 'getprice','uses' => 'HomeController@getprice']);

	Route::get('/auth',['as' => 'auth','uses' => 'AuthController@auth']);
	Route::post('/auth/email',['as' => 'emailauth','uses' => 'AuthController@email']);

	Route::get('auth/{provider}', 'AuthController@redirect');
	Route::get('auth/{provider}/callback', 'AuthController@callback');

	Route::get('/register',['as' => 'register', 'uses' => 'AuthController@register']);
	Route::post('/register/email',['as' => 'emailregister','uses' => 'AuthController@emailregister']);

	Route::get('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);
//});

Route::group(['middleware' => ['web','auth']], function(){
	Route::get('/print',['as' => 'print', 'uses' => 'PageController@print']);
	Route::get('/orders',['as' => 'orders', 'uses' => 'PageController@orders']);
	Route::get('/orders/print/{id}',['as' => 'print_orders','uses' => 'PageController@print_orders']);
	Route::get('/orders/delete/{id}',['as' => 'delete_orders','uses' => 'PageController@delete_orders']);
	Route::get('/orders/details/{id}',['as' => 'orders_details', 'uses' => 'PageController@orders_details']);
	Route::post('/orders/add',['as' => 'add_order','uses' => 'PageController@add_order']);
	Route::get('/settings',['as' =>'settings', 'uses' => 'PageController@settings']);
	Route::post('/settings/password',['as' => 'password','uses' => 'PageController@password']);
	Route::post('upload/add',['as' => 'upload', 'uses' => 'UploadController@add']);
	Route::post('/address/add',['as' => 'add_address','uses' => 'PageController@add_address']);
	Route::post('/address/delete',['as' => 'delete_address','uses' => 'PageController@delete_address']);
	Route::post('/verify/discount',['as' => 'verify_discount','uses' => 'PageController@verify_discount']);
});

Route::group(['middleware' => ['web','admin']], function(){
	Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'PageController@dashboard']);
	Route::get('/dashboard/details/{id}',['as' => 'dashboard_details','uses' => 'PageController@dashboard_details']);
	Route::get('upload/get/{filename}', ['as' => 'getdocs', 'uses' => 'UploadController@get']);
});

Route::get('download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/app/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');