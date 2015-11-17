<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alaouy\Youtube\Youtube;

class Video extends Controller
{
    
       var $ytarr;
       var $videoInfo;
       
    var $id;
    var $channelID;
    var $duration;
    var $title;
    var $description;
    var $channelName;
    var $catID;
    var $catTitle;
    var $dLCount;
    var $lCount;
    var $sCount;
    var $vCount;
    var $publishOn;
    var $dLinks;
    var $rVideo;
    var $vComments;
    var $cCount;
    var $cLogo;
    
    var $key ;
    public function  __construct($id){
        $this->key= "AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U";
        
        $this->id = $id;
        $this->getRequest();
        
        
        
        
        
        
        $this->retriveCatId();
        $this->retriveCatTitle();
        $this->retriveChannelId();
        $this->retriveChannelName();
        $this->retriveDLCount();
        $this->retriveDLinks();
        $this->retriveDescription();
        $this->retriveDuration();
        $this->retriveLCount();
        $this->retrivePublishOn();
        $this->retrivePublishOn();
        $this->retriveRelatedVideos();
        $this->retriveSCount();
        $this->retrivecCount();
        $this->retriveVCount();
        $this->retriveTitle();
        $this->retriveCLogo();
    }
    
    public function get(){
        
        return [
            'id' => $this->id,
            'channelID' => $this->channelID,
            'duration' => $this->duration,
            'cCount' => $this->cCount,
            'catID' => $this->catID,
            'catTitle' => $this->catTitle,
            'channelName' => $this->channelName,
            'dLCount' => $this->dLCount,
            'dLinks' =>$this->dLinks,
            'description' => $this->description,
          
            'lCount' => $this->lCount,
            'publishOn' => $this->publishOn,
            'rVideo' => $this->rVideo,
            'sCount' => $this->sCount,
            'title' => $this->title,
            'vCount' => $this->vCount,
            'cLogo'  => $this->cLogo,
            
            
            
        ];
    }
    private function retriveVCount(){
        $this->vCount = $this->videoInfo->statistics->viewCount;
        
        
    }
    private function retrivecCount(){
        $this->cCount = $this->videoInfo->statistics->commentCount;
        
        
    }
    private function retriveCatId(){
        $this->catID = $this->videoInfo->snippet->categoryId;
    }
    private function retriveCatTitle(){
        $this->catTitle = $this->categoryIdtoTitle();
    }
    private function retriveChannelName(){
        $this->channelName = $this->videoInfo->snippet->channelTitle;
    }
     private function retriveChannelId(){
        $this->channelID = $this->videoInfo->snippet->channelId;
        
    }
  
    private function retriveDLinks(){
        $this->dLinks = $this->downloadLinks();
        
    }
    private function retriveDescription(){
        $this->description   = $this->videoInfo->snippet->description;
        $this->description = 
        str_replace("\n","<br>",  $this->description);
    }   
    private function retriveDuration(){
        $this->duration   = $this->duration();
        
    }
    private function retriveLCount(){
        $this->lCount   = $this->videoInfo->statistics->likeCount;
        
    }
    
    private function retriveDLCount(){
        $this->dLCount   = $this->videoInfo->statistics->dislikeCount;
        
    }
    private function retrivePublishOn(){
        $this->publishOn   = $this->videoInfo->snippet->publishedAt;
        
    }
    private function retriveRelatedVideos(){
        $this->rVideo = [];
        
    }
     public function retriveSCount(){
        $this->sCount = 0;
        
        $url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$this->channelID&key=$this->key";
     
        $content = file_get_contents($url);
         $json_a=json_decode($content,true); 
         
        $this->sCount = $json_a["items"][0]["statistics"]["subscriberCount"] ;
    }
      private function retriveTitle(){
        $this->title   = $this->videoInfo->snippet->title;
        
    }
    private function retriveCLogo(){
       $channel = new ChannelController();
       
        $this->cLogo = $channel->logo($this->channelID, $this->key);
    }
   /* sCount
    title
    * vComment
    * vCount
    * 
    */
    public function categoryIdtoTitle(){
        $id =$this->catID;
     $content = file_get_contents("https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&regionCode=us&key=$this->key");
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
    //Through Hacks 
        $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$this->id);
            parse_str($content, $ytarr);
            $this->ytarr = $ytarr;
   
   //Through API         
            $Youtube  = new Youtube($this->key);
                $video = $Youtube->getVideoInfo($this->id);
                $this->videoInfo = $video;
            
    }
 
   
     public function duration(){
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
     return  $manifestUrl = urldecode($this->ytarr['dashmpd']);
        
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
    
}
