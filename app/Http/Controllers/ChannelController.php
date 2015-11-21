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
  
    
    function getVideos($videosId){
       $arr = [];
        foreach($videosId as $id)
        array_push($arr, (new Video($id))->get());
        
        
        return $arr;
        
    }
    
    function getVideosId($id,$key){
   
        
        $arr = [];
          
        $content = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=id&channelId=$id&maxResults=10&order=date&key=$key");
        $json_a=json_decode($content,true); 

        $list = $json_a["items"];
        
        foreach($list as $l){
            
            if($l["id"]["kind"]=="youtube#video"){

                    array_push($arr, $l["id"]["videoId"]);


                }

            }

        return   $arr;  
    }
    public function logo($id,$key){
        
       
        $Youtube  = new Youtube($key);
                $channel = $Youtube->getChannelById($id);
                
               return $channel->snippet->thumbnails->default->url;
    }
    
    function videos($id,$key){
          
         $videoIDs = $this->getVideosId($id,$key);
         $videos = $this->getVideos($videoIDs);
         return $videos;
        
    }
    public function banner($id,$key){
          $url = "https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id=$id&key=$key";
     
        $content = file_get_contents($url);
         $json_a=json_decode($content,true); 
        return $json_a["items"][0]["brandingSettings"]["image"]["bannerImageUrl"];
    }
    public function get($key, $id){
        
         $Youtube  = new Youtube($key);
        
        
        $channel = $Youtube->getChannelById($id);
    
        
           
    
       
          
         return [
            'id' =>$channel->id,
            'title' => $channel->snippet->title,
            'logo' => $channel->snippet->thumbnails->default->url,
            'banner' => $this->banner($id, $key),
            'sCount' => $channel->statistics->subscriberCount,
            
            'videos' => $this->videos($id,$key),
                 
            
            
        ];
        
        
    }
    public function index(Request $request)
    {
        
                $channel = $this->get("AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U",$request->id);
    ///    return $this->logo('UCFFbwnve3yF62-tVXkTyHqg',"AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U");
        return view('front.channel.channel',compact('channel'));
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

    /**a
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
