<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(\App\Services\GoogleLogin $ga)
    {
        
        $token = \Session::get('token');

        //echo $token[]];
        $client = $ga->client;
      
        
        $client->setAccessToken($token);
       
       $plus = new \Google_Service_Plus($client);
       
       $acessToken = $token['access_token'];
       
       $accountObj = call_api($acessToken,"https://www.googleapis.com/oauth2/v1/userinfo");
       
    //  $me = $plus->people->get('me');

     //  $people->toSimpleObject();
       print_r( $accountObj);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $token = \Session::get('token');
        
       
       //$token=json_decode($token,true);
        
      
        
        
        print_r($token);
     //   $youtube = new Google_Service_YouTube($client);

       // $resourceId = new Google_Service_YouTube_ResourceId();

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
