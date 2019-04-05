<?php

namespace App\Http\Responses\Backend\Post;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Post\Post
     */
    protected $posts;

    /**
     * @param App\Models\Post\Post $posts
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.posts.edit')->with([
            'post' => $this->posts
        ]);
    }
}