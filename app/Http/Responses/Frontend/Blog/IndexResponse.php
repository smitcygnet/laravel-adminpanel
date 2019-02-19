<?php

namespace App\Http\Responses\Frontend\Blog;

use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
   protected $blogs;
   protected $search;
   protected $user;

   public function __construct($blogs,$search,$user)
    {
        $this->blogs  = $blogs;
        $this->search = $search;
        $this->user   = $user;
    }

    public function toResponse($request)
    {
        return view('frontend.blogs.index')->with([
            'blogs'  => $this->blogs,
            'search' => $this->search,
            'user'   => $this->user,
        ]);
    }

}