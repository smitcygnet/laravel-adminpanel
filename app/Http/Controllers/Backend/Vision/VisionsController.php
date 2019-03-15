<?php

namespace App\Http\Controllers\Backend\Vision;

use App\Models\Vision\Vision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Vision\CreateResponse;
use App\Http\Responses\Backend\Vision\EditResponse;
use App\Repositories\Backend\Vision\VisionRepository;
use App\Http\Requests\Backend\Vision\ManageVisionRequest;
use App\Http\Requests\Backend\Vision\CreateVisionRequest;
use App\Http\Requests\Backend\Vision\StoreVisionRequest;
use App\Http\Requests\Backend\Vision\EditVisionRequest;
use App\Http\Requests\Backend\Vision\UpdateVisionRequest;
use App\Http\Requests\Backend\Vision\DeleteVisionRequest;

/**
 * VisionsController
 */
class VisionsController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisionRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param VisionRepository $repository;
     */
    public function __construct(VisionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Vision\ManageVisionRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageVisionRequest $request)
    {
        return new ViewResponse('backend.visions.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateVisionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Vision\CreateResponse
     */
    public function create(CreateVisionRequest $request)
    {
        return new CreateResponse('backend.visions.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVisionRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreVisionRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.visions.index'), ['flash_success' => trans('alerts.backend.visions.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Vision\Vision  $vision
     * @param  EditVisionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Vision\EditResponse
     */
    public function edit(Vision $vision, EditVisionRequest $request)
    {
        return new EditResponse($vision);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateVisionRequestNamespace  $request
     * @param  App\Models\Vision\Vision  $vision
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateVisionRequest $request, Vision $vision)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $vision, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.visions.index'), ['flash_success' => trans('alerts.backend.visions.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteVisionRequestNamespace  $request
     * @param  App\Models\Vision\Vision  $vision
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Vision $vision, DeleteVisionRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($vision);
        //returning with successfull message
        return new RedirectResponse(route('admin.visions.index'), ['flash_success' => trans('alerts.backend.visions.deleted')]);
    }
    
}
