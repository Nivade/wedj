<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'youtube_id', 'soundcloud_id',
    ];

    public function playlist_items()
    {
        return $this->hasMany('App\PlaylistItem');
    }
}
