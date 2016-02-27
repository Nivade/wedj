<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistItem extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'playlist_id', 'track_id',
    ];

    public function playlist()
    {
    	return $this->belongsTo('App\Playlist');
    }

    public function track()
    {
    	return $this->belongsTo('App\Track');
    }
}
