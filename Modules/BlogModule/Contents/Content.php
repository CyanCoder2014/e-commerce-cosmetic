<?php

namespace Modules\BlogModule\Contents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Bus\Queueable;
use Nicolaslopezj\Searchable\SearchableTrait;


class Content extends Model
{

    use SearchableTrait;
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'title' => 10,
            'intro' => 5,
            'text' => 2,
        ],
        'joins' => [
        ],
    ];
    protected $fillable = [
        'id', 'users_id','active', 'cat_id', 'title', 'image', 'image_b', 'intro', 'text', 'view', 'like','share', 'comment','report','ban',
        'state', 'news', 'users_id', 'content','related_products','next_link','previous_link'
    ];

    protected $casts=[
        'related_products' => 'array',
        'title' => 'array',
        'intro' => 'array',
        'text' => 'array',
        'next_link' => 'array',
        'previous_link' => 'array',
        'active' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }


    public function cat()
    {
        return $this->belongsTo('Modules\BlogModule\Contents\ContentCat' , 'cat_id');
    }


    public function comments()
    {
        return $this->hasMany('Modules\BlogModule\Contents\ContentComment' , 'post_id')->where('parent_id','0')->orderby('id', 'desc')->take(1);
    }


    public static function publish($title ,$intro ,$text, $image, $image_b, $users_id, $news, $state)
    {
        $feed = new static(compact('title', 'intro', 'text', 'image','image_b', 'users_id', 'news', 'state'));

        return $feed;
    }

    public function commentNumber($postId)
    {
        return ContentComment::where('post_id', $postId)->get()->count();
    }


    public function share($postId)
    {
        return Content::where('id', $postId)->first();
    }
}
