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

   public function __construct($blog)
    {
        $this->blog = $blog;
    }
    public function toResponse($request)
    {
    	$blogs = Blog::where('id', $this->blog)->get();
        return view('frontend.blogs.index')->with([
            'blogs'=> $blogs,
        ]);
    }
}