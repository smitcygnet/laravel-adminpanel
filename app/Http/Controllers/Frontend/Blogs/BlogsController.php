<?php

namespace App\Http\Controllers\Frontend\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Blog\ManageBlogsRequest;
use App\Http\Responses\Frontend\Blog\IndexResponse;
use App\Http\Responses\Frontend\Blog\ShowResponse;
use App\Http\Responses\RedirectResponse;
use App\Models\BlogCategories\BlogCategory;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Repositories\Backend\Blogs\BlogsRepository;
use DB;


/**
 * Class BlogsController.
 */
class BlogsController extends Controller
{
    /**
     * Blog Status.
     */
    protected $status = [
        'Published' => 'Published',
        'Draft'     => 'Draft',
        'InActive'  => 'InActive',
        'Scheduled' => 'Scheduled',
    ];

    /**
     * @var BlogsRepository
     */
    protected $blog;

    /**
     * @param \App\Repositories\Frontend\Blogs\BlogsRepository $blog
     */
    public function __construct(BlogsRepository $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @param \App\Http\Requests\Frontend\Blogs\ManageBlogsRequest $request
     *
     * @return \App\Http\Responses\Frontend\Blog\IndexResponse
     */
    public function index(ManageBlogsRequest $request)
    {

        $blogs = Blog::paginate(2);
        //echo "==".$request->session()->get('onlyme_search')."==";
        $user   = $request->get('user', $request->session()->get('onlyme_search', '' ));
        $search = $request->get('search', $request->session()->get('blog_search', '' ));
        //echo "----".$user."--";
        if($user){
            $request->session()->put('onlyme_search', $search);
            $blogs = Blog::
                select('blogs.*')->where('blogs.created_by', '=',$user)->paginate(2);
            $request->session()->put('onlyme_search', $user);
        }else{
           $request->session()->forget('onlyme_search');
        }

        if($search){
            $request->session()->put('blog_search', $search);
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

            if($user){
            $blogs = Blog::
                  join('blog_map_categories', 'blogs.id', '=', 'blog_map_categories.blog_id')
                ->join('blog_map_tags', 'blogs.id', '=', 'blog_map_tags.blog_id')
                ->select('blogs.*')
                ->whereIn('blog_map_categories.category_id', $catidsArr)
                ->orWhereIn('blog_map_tags.tag_id', $tagidsArr)
                ->orWhere('blogs.name', 'LIKE', '%' . $search . '%')
                ->where('blogs.created_by', '=', $user)
                ->groupBy('blogs.id')
                ->paginate(2);
           }else{
                $blogs = Blog::
                  join('blog_map_categories', 'blogs.id', '=', 'blog_map_categories.blog_id')
                ->join('blog_map_tags', 'blogs.id', '=', 'blog_map_tags.blog_id')
                ->select('blogs.*')
                ->whereIn('blog_map_categories.category_id', $catidsArr)
                ->orWhereIn('blog_map_tags.tag_id', $tagidsArr)
                ->orWhere('blogs.name', 'LIKE', '%' . $search . '%')
                ->groupBy('blogs.id')
                ->paginate(2);
           }
        }else{
           $request->session()->forget('blog_search');
        }

        return new IndexResponse($blogs,$search,$user);
    }


    /**
     * @param \App\Http\Requests\Backend\Blogs\ManageBlogsRequest $request
     *
     * @return mixed
     */
    public function create(ManageBlogsRequest $request)
    {
        $blogTags = BlogTag::getSelectData();
        $blogCategories = BlogCategory::getSelectData();

        return new CreateResponse($this->status, $blogCategories, $blogTags);
    }

    /**
     * @param \App\Http\Requests\Backend\Blogs\StoreBlogsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBlogsRequest $request)
    {
        $this->blog->create($request->except('_token'));

        return new RedirectResponse(route('admin.blogs.index'), ['flash_success' => trans('alerts.backend.blogs.created')]);
    }

/**
     * @param \App\Models\Blogs\Blog                              $blog
     * @param \App\Http\Requests\Backend\Blogs\ManageBlogsRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function show($blog, ManageBlogsRequest $request)
    {
        $search = $request->get('search', $request->session()->get('blog_search', '' ));
        return new ShowResponse($blog,$search);
    }

    /**
     * @param \App\Models\Blogs\Blog                              $blog
     * @param \App\Http\Requests\Backend\Blogs\ManageBlogsRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Blog $blog, ManageBlogsRequest $request)
    {
        $blogCategories = BlogCategory::getSelectData();
        $blogTags = BlogTag::getSelectData();

        return new EditResponse($blog, $this->status, $blogCategories, $blogTags);
    }

    /**
     * @param \App\Models\Blogs\Blog                              $blog
     * @param \App\Http\Requests\Backend\Blogs\UpdateBlogsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Blog $blog, UpdateBlogsRequest $request)
    {
        $input = $request->all();
        $this->blog->update($blog, $request->except(['_token', '_method']));
        return new RedirectResponse(route('admin.blogs.index'), ['flash_success' => trans('alerts.backend.blogs.updated')]);
    }

    /**
     * @param \App\Models\Blogs\Blog                              $blog
     * @param \App\Http\Requests\Backend\Blogs\ManageBlogsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Blog $blog, ManageBlogsRequest $request)
    {
        $this->blog->delete($blog);

        return new RedirectResponse(route('admin.blogs.index'), ['flash_success' => trans('alerts.backend.blogs.deleted')]);
    }
}
