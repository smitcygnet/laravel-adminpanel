<?php

namespace App\Http\Controllers\Backend\News;

use App\Models\News\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\News\CreateResponse;
use App\Http\Responses\Backend\News\EditResponse;
use App\Repositories\Backend\News\NewsRepository;
use App\Http\Requests\Backend\News\ManageNewsRequest;
use App\Http\Requests\Backend\News\CreateNewsRequest;
use App\Http\Requests\Backend\News\StoreNewsRequest;
use App\Http\Requests\Backend\News\EditNewsRequest;
use App\Http\Requests\Backend\News\UpdateNewsRequest;
use App\Http\Requests\Backend\News\DeleteNewsRequest;

/**
 * NewsController
 */
class NewsController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewsRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param NewsRepository $repository;
     */
    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\News\ManageNewsRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageNewsRequest $request)
    {
        return new ViewResponse('backend.news.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateNewsRequestNamespace  $request
     * @return \App\Http\Responses\Backend\News\CreateResponse
     */
    public function create(CreateNewsRequest $request)
    {
        return new CreateResponse('backend.news.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreNewsRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.news.index'), ['flash_success' => trans('alerts.backend.news.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\News\News  $news
     * @param  EditNewsRequestNamespace  $request
     * @return \App\Http\Responses\Backend\News\EditResponse
     */
    public function edit(News $news, EditNewsRequest $request)
    {
        return new EditResponse($news);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewsRequestNamespace  $request
     * @param  App\Models\News\News  $news
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $news, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.news.index'), ['flash_success' => trans('alerts.backend.news.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteNewsRequestNamespace  $request
     * @param  App\Models\News\News  $news
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(News $news, DeleteNewsRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($news);
        //returning with successfull message
        return new RedirectResponse(route('admin.news.index'), ['flash_success' => trans('alerts.backend.news.deleted')]);
    }
    
}
