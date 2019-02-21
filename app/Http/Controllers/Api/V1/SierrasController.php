<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentsResource;
use Sierra;
use App\Repositories\Backend\Sierra\SierraRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * SierrasController
 */
class SierrasController extends Controller
{
    /**
     * variable to store the repository object
     * @var SierraRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SierraRepository $repository;
     */
    public function __construct(SierraRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sierra\ManageSierraRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSierraRequest $request)
    {
        return new ViewResponse('backend.sierras.index');
    }

}
