<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentsResource;
use App\Models\Cygnet\Cygnet;
use App\Repositories\Backend\Cygnet\CygnetRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * CygnetsController
 */
class CygnetsController extends Controller
{
    /**
     * variable to store the repository object
     * @var CygnetRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CygnetRepository $repository;
     */
    public function __construct(CygnetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Cygnet\ManageCygnetRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCygnetRequest $request)
    {
        return new ViewResponse('backend.cygnets.index');
    }

}
