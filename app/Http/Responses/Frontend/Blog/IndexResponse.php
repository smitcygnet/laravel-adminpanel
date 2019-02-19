<?php

namespace App\Http\Responses\Frontend\Blog;

use Illuminate\Contracts\Support\Responsable;
use App\Models\BlogCategories\BlogCategory;
use App\Models\BlogTags\BlogTag;
use App\Models\Blogs\Blog;
use DB;
class IndexResponse implements Responsable
{
    public function toResponse($request)
    {
    	$blogs = Blog::all();
    	$search = $request->input('search');
    	if($search){
            $catidsArr = $tagidsArr = [];

            $catids =  BlogCategory::select('blog_categories.id as categoryids')
             ->where('blog_categories.name', 'LIKE', '%' . $search . '%')
             ->get()->toArray();

            if($catids) {
                $catidsArr  = array_column($catids, 'categoryids');
            }

             $tagids =  BlogTag::select('blog_tags.id as tagids')
             ->where('blog_tags.name', 'LIKE', '%' . $search . '%')
             ->get()->toArray();

            if($tagids) {
                $tagidsArr  = array_column($tagids, 'tagids');
            }

            $blogs = Blog::
            	  join('blog_map_categories', 'blogs.id', '=', 'blog_map_categories.blog_id')
            	->join('blog_map_tags', 'blogs.id', '=', 'blog_map_tags.blog_id')
                ->select('blogs.*')
                ->whereIn('blog_map_categories.category_id', $catidsArr)
                ->orWhereIn('blog_map_tags.tag_id', $tagidsArr)
                ->orWhere('blogs.name', 'LIKE', '%' . $search . '%')
                ->groupBy('blogs.id')
                ->get();
    	}

        return view('frontend.blogs.index')->with([
            'blogs'=> $blogs,
        ]);
    }
}