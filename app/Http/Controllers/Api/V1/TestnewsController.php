<?php

namespace App\Http\Controllers\Api\V1;

use DummyRespNamespace;
use App\Models\Testnew\Testnew;
use App\Repositories\Backend\Testnew\TestnewRepository;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\Backend\Testnew\CreateTestnewRequest;
use App\Http\Requests\Backend\Testnew\StoreTestnewRequest;
use App\Http\Requests\Backend\Testnew\EditTestnewRequest;
use App\Http\Requests\Backend\Testnew\UpdateTestnewRequest;
use App\Http\Requests\Backend\Testnew\DeleteTestnewRequest;

/**
 * TestnewsController
 */
class TestnewsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestnewRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TestnewRepository $repository;
     */
    public function __construct(TestnewRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return new ViewResponse('backend.testnews.index');

        $limit   = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy  = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return TestnewsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTestnewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testnew\CreateResponse
     */
    public function create(CreateTestnewRequest $request)
    {
        return new CreateResponse('backend.testnews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTestnewRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTestnewRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.testnews.index'), ['flash_success' => trans('alerts.backend.testnews.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Testnew\Testnew  $testnew
     * @param  EditTestnewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testnew\EditResponse
     */
    public function edit(Testnew $testnew, EditTestnewRequest $request)
    {
        return new EditResponse($testnew);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTestnewRequestNamespace  $request
     * @param  App\Models\Testnew\Testnew  $testnew
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTestnewRequest $request, Testnew $testnew)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $testnew, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.testnews.index'), ['flash_success' => trans('alerts.backend.testnews.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTestnewRequestNamespace  $request
     * @param  App\Models\Testnew\Testnew  $testnew
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Testnew $testnew, DeleteTestnewRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($testnew);
        //returning with successfull message
        return new RedirectResponse(route('admin.testnews.index'), ['flash_success' => trans('alerts.backend.testnews.deleted')]);
    }

}
