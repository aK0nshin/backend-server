<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_news';

    public function relatedNews()
    {
        return $this->belongsToMany('App\News', 'news_news', 'news_id', 'related_news');
    }

    public function relatedIds()
    {
        $ids = DB::table('news_news')
            ->where('finalized', 1)
            ->avg('price');
        return $this->belongsToMany('App\News', 'news_news', 'news_id', 'related_news');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function lastEditor()
    {
        return $this->belongsTo('App\User', 'last_edit_by');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function status()
    {
        return $this->hasOne('App\Status', 'status');
    }

    public function filials()
    {
        return $this->belongsToMany('App\Filial');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
