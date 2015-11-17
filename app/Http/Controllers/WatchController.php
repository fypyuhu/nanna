<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alaouy\Youtube\Youtube;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    var $ytarr;
    var $id;
    
    private function categoryIdtoTitle($id){
     $content = file_get_contents("https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&regionCode=us&key=AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U");
           $json_a=json_decode($content,true); 
           //$json_a = $json_a[1]; 
           $c = 0;
           foreach ($json_a as $key => $valus){
             if($c>1){
              foreach($valus as $v){
               if($v['id'] == $id)   
                    return ($v['snippet']['title']);
              }   
              
               
               
             }
             $c++;
           }
    }
    private function getRequest(){
        $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$this->id);
            parse_str($content, $ytarr);
            $this->ytarr = $ytarr;
    }
    private function videoInfo(){
        
                $Youtube  = new Youtube('AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U');
                $video = $Youtube->getVideoInfo($this->id);
                return $video;
    }
   
     private function duration(){
      //   return $this->id;
//youtube video id
    // geting the video info
         $seconds = $this->ytarr['length_seconds'];
        $H = floor($seconds / 3600);
        $i = ($seconds / 60) % 60;
        $s = $seconds % 60;
        if($H==0)
              return sprintf("%02d:%02d",  $i, $s);
        if($i==0)
             return sprintf("%02d",  $s);
        
        return sprintf("%02d:%02d:%02d", $H, $i, $s);
           
            
    }
    private function videoUrl(){
           parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$this->id),$info);     //decode the data
            $streams = $info['url_encoded_fmt_stream_map']; //the video's location info
            $streams = explode(',',$streams);
            parse_str(urldecode($streams[0]),$data);  //In this example I am downloading only the first video

            $url=$data['url'];
            $sig=$data['signature'];
            unset($data['type']);
            unset($data['url']);
            unset($data['sig']);
            $urlPlay= str_replace('%2C', ',' ,$url.'&'.http_build_query($data).'&signature='.$sig); 
        
    }
    
     private function downloadLinks(){
        return ['240'=>'link','360' => 'link' ,'720' => 'link' , 'mp3' => 'link'];
        
    }
    private function manifest(){
     return  $manifestUrl = $this->ytarr['dashmpd'];
        
    }
    private function downloadLinks1(){
                    $video_id = $this->id; //youtube video id

            // geting the video info
            $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$video_id);
            parse_str($content, $ytarr);
            
            var_dump($ytarr);
            exit;
            // getting the links
            $links = explode(',',$ytarr['url_encoded_fmt_stream_map']);

            // formats you would like to use
            $formats = array(35,34,6,5);

            //loop trough the links to find the one you need 
            foreach($links  as $link){
                 parse_str($link, $args);

                 if(in_array($args['itag'],$formats)){

                      //right link found since the links are in hi-to-low quality order 
                      //the match will be the one with highest quality
                      $video_url = $args['url'];

                      // add signature to the link
                      if($args['sig']){
                        $video_url .= '&signature='.$args['sig'];
                      }

                      /*
                      * What follows is three ways of proceeding with the link, 
                      * note they are not supposed to work all together but one at a time
                      */

                      //download the video and output to browser
                      @readfile($video_url); // this works fine
                      exit;

                      //show video as link
                      echo '<a href="'.$video_url.'">link for '.$args['itag'].'</a>'; //this won't work
                      exit;

                      //redirect to video
                      header("Location: $video_url"); // this won't work
                      exit;
                 }
            }
        
        
    }
    public function index(Request $request)
    {
        $this->id = $request->v;
        $this->getRequest();
        
        return 
        
        
           //the youtube video ID
            $downloadsLinks = $this->downloadLinks();
           
            $video = $this->videoInfo();
            //var_dump($video);
          
            
        return view('front.watch.watch',compact('video','downloadsLinks'));
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
