<?php

namespace App\Http\Controllers\Backend\Testnew;

use App\Models\Testnew\Testnew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Testnew\CreateResponse;
use App\Http\Responses\Backend\Testnew\EditResponse;
use App\Repositories\Backend\Testnew\TestnewRepository;
use App\Http\Requests\Backend\Testnew\ManageTestnewRequest;

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
     * @param  App\Http\Requests\Backend\Testnew\ManageTestnewRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTestnewRequest $request)
    {
        return new ViewResponse('backend.testnews.index');
    }
    
}
