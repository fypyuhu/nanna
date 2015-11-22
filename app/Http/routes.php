<?php
Route::get('/login', ['uses' => 'GoogleLoginController@index', 'as' => 'login']);
Route::get('/loginCallback', ['uses' => 'GoogleLoginController@store', 'as' => 'loginCallback']);

Route::any('/search', ['middleware' => 'google_login', 'as' => 'search', 'uses' => 'YoutubeAPIController@search']);

Route::any('/subscribe/store', [
    
    'middleware' => 'google_login', 
    'as' => 'subscribe/store', 
    'uses' => 'SubscribeController@store'
    ]);


Route::resource('subscribe', 'SubscribeController', [
	'except' => ['store']

]);





// Home
Route::get('/', [
	'uses' => 'HomeController@index', 
	'as' => 'home'
]);
Route::get('language', 'HomeController@language');

//raw  routes start
Route::get('material/report', [
	'uses' => 'MaterialController@report', 
	'as' => 'material.report',
        'middleware' => 'admin'
]);

Route::resource('material', 'MaterialController', [
	//'except' => ['create', 'show']
    'middleware' => 'admin'
]);
Route::get('product/report', [
	'uses' => 'ProductController@report', 
	'as' => 'product.report',
        'middleware' => 'admin'
]);

Route::resource('search', 'SearchController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('category', 'CategoryController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('channel', 'ChannelController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('contact', 'ContactController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('index', 'IndexController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('privacy', 'PrivacyController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('terms', 'TermsController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
Route::resource('watch', 'WatchController', [
    
   // 'except' => ['create', 'show']
    //'middleware' => 'admin'

    
]);
//raw Routes end



// Admin
Route::get('admin', [
	'uses' => 'AdminController@admin',
	'as' => 'admin',
	'middleware' => 'admin'
]);

Route::get('medias', [
	'uses' => 'AdminController@filemanager',
	'as' => 'medias',
	'middleware' => 'redac'
]);


// Blog
Route::get('blog/order', ['uses' => 'BlogController@indexOrder', 'as' => 'blog.order']);
Route::get('articles', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');


// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);


// User
Route::get('user/sort/{role}', 'UserController@indexSort');

Route::get('user/roles', 'UserController@getRoles');
Route::post('user/roles', 'UserController@postRoles');

Route::put('userseen/{user}', 'UserController@updateSeen');

Route::resource('user', 'UserController');

// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
