<?php

namespace mir24;

use Illuminate\Database\Eloquent\Model;

use DB;

class News extends Model
{
    public function relatedNews()
    {
        return $this->belongsToMany('mir24\News', 'news_news', 'news_id', 'related_news');
    }

    public function relatedIds()
    {
        $ids = DB::table('news_news')
            ->where('news_id', $this->id)
            ->pluck('related_news');
        return $ids;
    }

    public function creator()
    {
        return $this->belongsTo('mir24\User', 'created_by');
    }

    public function lastEditor()
    {
        return $this->belongsTo('mir24\User', 'last_edit_by');
    }

    public function image()
    {
        return $this->belongsTo('mir24\Image');
    }

    public function status()
    {
        return $this->hasOne('mir24\Status', 'status');
    }

    public function filials()
    {
        return $this->belongsToMany('mir24\Filial');
    }

    public function tags()
    {
        return $this->belongsToMany('mir24\Tag');
    }
}