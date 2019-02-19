<?php

namespace App\Http\Responses\Backend\Comment;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Comment\Comment
     */
    protected $comments;

    /**
     * @param App\Models\Comment\Comment $comments
     */
    public function __construct($comments)
    {
        $this->comments = $comments;
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
        return view('backend.comments.edit')->with([
            'comments' => $this->comments
        ]);
    }
}