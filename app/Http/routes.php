<?php
function ip(){
    
     if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

Route::get('/ip',function(){
       // check for shared internet/ISP IP
   return ip();
    
});
Route::get('/info',function(){
   $video =$videoList = Youtube::searchVideos('Android');
   var_dump($video);
   echo "<br><br><br>";
  
  $d = "";
   echo $d;
    
});
Route::get('/download', function(){
    
    
    
  $id = "111_fGEdIvs"; //the youtube video ID
//$id = $_GET['id'];

//$format = $_GET['fmt']; //the MIME type of the video. e.g. video/mp4, video/webm, etc.
  $ip = ip();
 $opts = array(
    'socket' => array(
        // IP:PORT use 0 value if you want your operating system to decide
        'bindto' => $ip.":80",
    )
);

$context = stream_context_create($opts);

parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$id, false, $context),$info);     //decode the data
$streams = $info['url_encoded_fmt_stream_map']; //the video's location info
$streams = explode(',',$streams);
parse_str(urldecode($streams[0]),$data);  //In this example I am downloading only the first video

$url=$data['url'];
$sig=$data['signature'];
unset($data['type']);
unset($data['url']);
unset($data['sig']);
$urlPlay= str_replace('%2C', ',' ,$url.'&'.http_build_query($data).'&signature='.$sig); 


    echo $urlPlay;


});
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
