<?php

namespace App\Http\Responses\Frontend\Blog;

use Illuminate\Contracts\Support\Responsable;
use App\Models\BlogCategories\BlogCategory;
use App\Models\BlogTags\BlogTag;
use App\Models\Blogs\Blog;
use DB;
class ShowResponse implements Responsable
{

   protected $blog;
   protected $search;

   public function __construct($blog,$search)
    {
        $this->blog = $blog;
        $this->search = $search;
    }

    public function toResponse($request)
    {
    	$blogs = Blog::where('id', $this->blog)->get();
        return view('frontend.blogs.show')->with([
            'blogs'=> $blogs,
            'search' => $this->search,
        ]);
    }
}