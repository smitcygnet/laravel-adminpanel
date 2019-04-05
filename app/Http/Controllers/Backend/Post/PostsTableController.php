<?php

namespace App\Http\Controllers\Backend\Post;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Post\PostRepository;
use App\Http\Requests\Backend\Post\ManagePostRequest;

/**
 * Class PostsTableController.
 */
class PostsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PostRepository
     */
    protected $post;

    /**
     * contructor to initialize repository object
     * @param PostRepository $post;
     */
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    /**
     * This method return the data of the model
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePostRequest $request)
    {
        return Datatables::of($this->post->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($post) {
                return Carbon::parse($post->created_at)->toDateString();
            })
            ->addColumn('actions', function ($post) {
                return $post->action_buttons;
            })
            ->make(true);
    }
}
