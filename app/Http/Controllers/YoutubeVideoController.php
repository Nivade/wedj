<?php

use Alaouy\Youtube;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class YoutubeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($query, $maxResults = 10)
    {
        $params = array(
            'q' => $query,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => $maxResults);

        // Ret
        $search = \Youtube::searchAdvanced($params, true);

        $videos = array();
        $id = 0;

        foreach($search['results'] as $result)
        {
            $video = \Youtube::getVideoInfo($result->id->videoId, array('id', 'snippet'));

            // Take everything we need.
            $videoData = array(
                'thumbnail'     => $video->snippet->thumbnails->default->url,
                'title'         => $video->snippet->title,
                'description'   => $video->snippet->description,
                'id'            => $video->id
                );

            //echo $video->player->embedHtml;
            //echo '<br><br>';

            $videos[$id++] = $videoData;
        }

        return view('youtubesearch.show', compact('videos'));
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
