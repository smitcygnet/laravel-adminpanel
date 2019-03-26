<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentsResource;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;
use Illuminate\Http\Request;
use Validator;

class StudentsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the students.
     *
     * @param Request $request
     *
     *@return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit   = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy  = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return StudentsResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Student $student
     *
     *@return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return new StudentsResource($student);
    }

    /**
     * Creates the Resource for Student.
     *
     * @param Request $request
     *
     *@return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $validation = $this->validateStudent($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }
        $this->repository->create($request->all());
        return new StudentsResource(Student::orderBy('created_at', 'desc')->first());
    }

    /**
     * @param Student      $Student
     * @param Request      $request
     *
     * @return mixed
     */
    public function update(Request $request, Student $student)
    {
        $validation = $this->validateStudent($request);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->update($student, $request->all());
        $student = Student::findOrfail($student->id);
        return new StudentsResource($student);
    }

    /**
     * @param Student  $student
     * @param Request  $request
     *
     * @return mixed
     */

    public function destroy(Student $student, Request $request)
    {
        $this->repository->delete($student);
        return $this->respond([
            'message' => trans('alerts.backend.students.deleted'),
        ]);
    }

    /**
     * validatStudent Student Requests.
     *
     * @param Request $request
     *
     * @return Validator object
     */
    public function validateStudent(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name'      => 'required|max:191',
            'last_name'       => 'required|max:191',
            'gender'          => 'required|max:191',
            'hobbies'         => 'required',
            'standard'        => 'required',
            'profile_picture' => 'required',
        ]);

        return $validation;
    }
}
