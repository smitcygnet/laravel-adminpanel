<?php

namespace App\Http\Controllers\Backend\Life;

use App\Models\Life\Life;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Life\CreateResponse;
use App\Http\Responses\Backend\Life\EditResponse;
use App\Repositories\Backend\Life\LifeRepository;
use App\Http\Requests\Backend\Life\ManageLifeRequest;
use App\Http\Requests\Backend\Life\CreateLifeRequest;
use App\Http\Requests\Backend\Life\StoreLifeRequest;
use App\Http\Requests\Backend\Life\EditLifeRequest;
use App\Http\Requests\Backend\Life\UpdateLifeRequest;
use App\Http\Requests\Backend\Life\DeleteLifeRequest;

/**
 * LivesController
 */
class LivesController extends Controller
{
    /**
     * variable to store the repository object
     * @var LifeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param LifeRepository $repository;
     */
    public function __construct(LifeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Life\ManageLifeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageLifeRequest $request)
    {
        return new ViewResponse('backend.lives.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateLifeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Life\CreateResponse
     */
    public function create(CreateLifeRequest $request)
    {
        return new CreateResponse('backend.lives.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreLifeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreLifeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.lives.index'), ['flash_success' => trans('alerts.backend.lives.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Life\Life  $life
     * @param  EditLifeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Life\EditResponse
     */
    public function edit(Life $life, EditLifeRequest $request)
    {
        return new EditResponse($life);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLifeRequestNamespace  $request
     * @param  App\Models\Life\Life  $life
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateLifeRequest $request, Life $life)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $life, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.lives.index'), ['flash_success' => trans('alerts.backend.lives.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteLifeRequestNamespace  $request
     * @param  App\Models\Life\Life  $life
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Life $life, DeleteLifeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($life);
        //returning with successfull message
        return new RedirectResponse(route('admin.lives.index'), ['flash_success' => trans('alerts.backend.lives.deleted')]);
    }
    
}
