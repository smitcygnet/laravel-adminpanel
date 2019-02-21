<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentsResource;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * TempsController
 */
class TempsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TempRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TempRepository $repository;
     */
    public function __construct(TempRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Temp\ManageTempRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTempRequest $request)
    {
        return new ViewResponse('backend.temps.index');
    }
    
}
