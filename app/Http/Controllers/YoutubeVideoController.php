<?php

use Alaouy\Youtube;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class YoutubeVideoController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($query, $limit = 10)
    {
        // Define search parameters.
        $params = array(
            'q' => $query,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => $limit);

        // Perform a search operation with those parameters.
        $search = \Youtube::searchAdvanced($params, true);

        $videos = array();
        $id = 0;

        // Search results are stored in the search object.
        // So for every result~
        foreach($search['results'] as $result)
        {
            // A youtube search result is defined as 'SearchResource'
            // So first we'll find the corresponding video.
            $video = \Youtube::getVideoInfo($result->id->videoId, array('id', 'snippet'));

            $track = new \App\Track(['youtube_id' => $video->id]);
            $track->save();

            // Then we store the data we actually need in a separate array.
            $videoData = array(
                'thumbnail'     => $video->snippet->thumbnails->default->url,
                'title'         => $video->snippet->title,
                'description'   => $video->snippet->description,
                'id'            => $video->id
                );

            // And add it to an array.
            $videos[$id++] = $videoData;
        }

        //return \Response::json($videos);
        return \View::make('youtube.search.show', compact('videos'));
    }

    public function video($id)
    {
        $video = \Youtube::getVideoInfo($id);

        return \Response::json($video);
    }
}
