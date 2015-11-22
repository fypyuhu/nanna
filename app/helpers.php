<?php
  function call_api($accessToken,$url){
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    $curlheader[0] = "Authorization: Bearer " . $accessToken;
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curlheader);

    $json_response = curl_exec($curl);
    curl_close($curl);

    $responseObj = json_decode($json_response);

    return $responseObj;       
}

if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' class="active"' : '';
	}
}

if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' class="active"' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' class="active"';
		}
		return '';
	}
}