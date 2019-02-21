<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentsResource;
use App\Models\Post\Post;
use App\Repositories\Backend\Post\PostRepository;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\Backend\Post\CreatePostRequest;
use App\Http\Requests\Backend\Post\StorePostRequest;
use App\Http\Requests\Backend\Post\EditPostRequest;
use App\Http\Requests\Backend\Post\UpdatePostRequest;
use App\Http\Requests\Backend\Post\DeletePostRequest;

/**
 * PostsController
 */
class PostsController extends Controller
{
    /**
     * variable to store the repository object
     * @var PostRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PostRepository $repository;
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Post\ManagePostRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePostRequest $request)
    {
        return new ViewResponse('backend.posts.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePostRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Post\CreateResponse
     */
    public function create(CreatePostRequest $request)
    {
        return new CreateResponse('backend.posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => trans('alerts.backend.posts.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Post\Post  $post
     * @param  EditPostRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Post\EditResponse
     */
    public function edit(Post $post, EditPostRequest $request)
    {
        return new EditResponse($post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequestNamespace  $request
     * @param  App\Models\Post\Post  $post
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $post, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => trans('alerts.backend.posts.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePostRequestNamespace  $request
     * @param  App\Models\Post\Post  $post
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Post $post, DeletePostRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($post);
        //returning with successfull message
        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => trans('alerts.backend.posts.deleted')]);
    }

}
