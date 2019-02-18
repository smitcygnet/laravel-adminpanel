<?php

namespace App\Http\Responses\Frontend\Blog;

use Illuminate\Contracts\Support\Responsable;
use App\Models\Blogs\Blog;
use DB;
class IndexResponse implements Responsable
{
    public function toResponse($request)
    {
    	$blogs = Blog::all();
    	$search = $request->input('search');
    	if($search){
    		$catids = DB::table('blog_categories')
                ->select('blog_categories.id as categoryids')
                ->where('blog_categories.name', 'LIKE', '%' . $search . '%')
                ->get(['categoryids'])->toArray();

            $catidsArr = $tagidsArr = [];

            if($catids) {
                $catidsArr  = array_column($catids, 'categoryids');
            }

            $tagids = DB::table('blog_tags')
                ->select('blog_tags.id as tagids')
                ->where('blog_tags.name', 'LIKE', '%' . $search . '%')
                ->get(['tagids'])->toArray();

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
