<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Youtube;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Set default parameters
        $params = array(
            'q'             => $request->q,
            'type'          => 'video',
            'part'          => 'id, snippet',
            'maxResults'    => 10
        );
        $Youtube  = new Youtube('AIzaSyC-Ccw-tu3dmO-XnaonRyzRgAtCg0LqN8U');
        // Make intial call. with second argument to reveal page info such as page tokens
        $search =  $Youtube->searchAdvanced($params, true);

        // Check if we have a pageToken
        if (isset($search['info']['nextPageToken'])) {
            $params['pageToken'] = $search['info']['nextPageToken'];
        }
        
        // Make another call and repeat
        $search = $Youtube->searchAdvanced($params, true);

        // Add results key with info parameter set
        //print_r($search['results']);
        //
        $results = $search['results'];
       /*
        foreach($results as $result){
        
            echo "videio ID : ".$result->id->videoId . "<br>\n";
         echo "publishedAt : ".$result->snippet->publishedAt . "<br>\n";
         echo "channelId : ".$result->snippet->channelId . "<br>\n";
         echo "title : ".$result->snippet->title . "<br>\n";
         echo "description : ".$result->snippet->description . "<br>\n";
         echo "thumbnails default: ".$result->snippet->thumbnails->default->url . "<br>\n";
        echo "thumbnails medium: ".$result->snippet->thumbnails->medium->url . "<br>\n";
        echo "thumbnails high: ".$result->snippet->thumbnails->high->url . "<br>\n";
         echo "channelTitle : ".$result->snippet->channelTitle . "<br>\n";
        echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++<br><br>\n\n";
         
        }
        echo "<br><br><br><br><br>";
        print_r($results);
           */ 
return view('front.search.search',['results' => $results]);
        
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
