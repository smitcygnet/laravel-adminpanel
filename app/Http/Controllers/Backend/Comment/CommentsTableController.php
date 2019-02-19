<?php

namespace App\Http\Controllers\Backend\Comment;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Comment\CommentRepository;
use App\Http\Requests\Backend\Comment\ManageCommentRequest;

/**
 * Class CommentsTableController.
 */
class CommentsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CommentRepository
     */
    protected $comment;

    /**
     * contructor to initialize repository object
     * @param CommentRepository $comment;
     */
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }

    /**
     * This method return the data of the model
     * @param ManageCommentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCommentRequest $request)
    {
        return Datatables::of($this->comment->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($comment) {
                return Carbon::parse($comment->created_at)->toDateString();
            })
            ->addColumn('actions', function ($comment) {
                return $comment->action_buttons;
            })
            ->make(true);
    }
}
