<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alaouy\Youtube\Youtube;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    var $key;
    public function logo($id,$key){
        
       
        $Youtube  = new Youtube($key);
                $channel = $Youtube->getChannelById($id);
                
               return $channel->snippet->thumbnails->default->url;
    }
    
    public function index()
    {
          $this->key = "AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U";
        $Youtube  = new Youtube($this->key);
                $channel = $Youtube->getChannelById('UCFFbwnve3yF62-tVXkTyHqg');;
                
        //        print_r($channel);
        return $this->logo('UCFFbwnve3yF62-tVXkTyHqg',"AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U");
        return view('front.channel.channel');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
