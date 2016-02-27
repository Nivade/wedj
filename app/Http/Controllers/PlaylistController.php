<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    public function create($name)
    {
      $playlist = new \App\Playlist(['name' => $name]);
      $playlist->save();
    }

    public function show($id, $track = null)
    {
        if (track == null)
          return \App\Playlist::find($id)->playlist_items;
        else
          return \App\PlaylistItem::where('playlist_id', $id)->where('track_id', $track)->get();

    }

    public function insert($id, $track)
    {
        $playlist_item = new \App\PlaylistItem(['playlist_id' => $id, 'track_id' => $track]);

        $existing_items = \App\Playlist::find($id)->playlist_items;
        foreach($existing_items as $item)
        {
            if ($item['track_id'] == $track)
                return;
        }

        $playlist_item->save();
    }
}
