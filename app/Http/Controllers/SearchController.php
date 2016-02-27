<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    private function YoutubeSearch($query)
    {
      // Define search parameters.
      $params = array(
          'q' => $query,
          'type' => 'video',
          'part' => 'id, snippet',
          'maxResults' => 10);

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

      return $videos;
    }


    public function show($service, $query)
    {
        if ($service == 'yt')
        {
          $videos = YoutubeSearch($query);
        }
        else if ($service == 'sc')
        {
          $videos = SoundCloudSearch($query);
        }


        return \View::make('search', compact('videos'));
    }
}
