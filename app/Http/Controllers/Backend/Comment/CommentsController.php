<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Models\Comment\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Comment\CreateResponse;
use App\Http\Responses\Backend\Comment\EditResponse;
use App\Repositories\Backend\Comment\CommentRepository;
use App\Http\Requests\Backend\Comment\ManageCommentRequest;
use App\Http\Requests\Backend\Comment\CreateCommentRequest;
use App\Http\Requests\Backend\Comment\StoreCommentRequest;
use App\Http\Requests\Backend\Comment\EditCommentRequest;
use App\Http\Requests\Backend\Comment\UpdateCommentRequest;
use App\Http\Requests\Backend\Comment\DeleteCommentRequest;

/**
 * CommentsController
 */
class CommentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var CommentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CommentRepository $repository;
     */
    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Comment\ManageCommentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCommentRequest $request)
    {
        return new ViewResponse('backend.comments.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCommentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Comment\CreateResponse
     */
    public function create(CreateCommentRequest $request)
    {
        return new CreateResponse('backend.comments.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCommentRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.comments.index'), ['flash_success' => trans('alerts.backend.comments.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Comment\Comment  $comment
     * @param  EditCommentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Comment\EditResponse
     */
    public function edit(Comment $comment, EditCommentRequest $request)
    {
        return new EditResponse($comment);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCommentRequestNamespace  $request
     * @param  App\Models\Comment\Comment  $comment
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $comment, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.comments.index'), ['flash_success' => trans('alerts.backend.comments.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCommentRequestNamespace  $request
     * @param  App\Models\Comment\Comment  $comment
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Comment $comment, DeleteCommentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($comment);
        //returning with successfull message
        return new RedirectResponse(route('admin.comments.index'), ['flash_success' => trans('alerts.backend.comments.deleted')]);
    }
    
}
