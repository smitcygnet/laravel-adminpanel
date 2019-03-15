<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\Student\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Student\CreateResponse;
use App\Http\Responses\Backend\Student\EditResponse;
use App\Repositories\Backend\Student\StudentRepository;
use App\Http\Requests\Backend\Student\ManageStudentRequest;
use App\Http\Requests\Backend\Student\CreateStudentRequest;
use App\Http\Requests\Backend\Student\StoreStudentRequest;
use App\Http\Requests\Backend\Student\EditStudentRequest;
use App\Http\Requests\Backend\Student\UpdateStudentRequest;
use App\Http\Requests\Backend\Student\DeleteStudentRequest;
use Illuminate\Support\Facades\DB;
/**
 * StudentsController
 */
class StudentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var StudentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param StudentRepository $repository;
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Student\ManageStudentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageStudentRequest $request)
    {

        echo "Student List<br>";

        $users = DB::table('students')->get();

        //$users = DB::table('users')->where('first_name','viral')->first();

        //$users = DB::table('users')->where('first_name','viral')->first();

        //$users = DB::table('users')->value('email');
        //
        //$users = DB::table('users')->pluck('email');

        //$users = DB::table('users')->where('first_name', 'Smith')->pluck('email');

        //$users = DB::table('students')->pluck('first_name','last_name');

      /* $students = DB::table('students')->orderBy('id')->chunk(5, function ($students) {
            foreach ($students as $student) {
               echo $student->first_name."---".$student->last_name."<br>";
            }
            //return false
        }); */

        // $a = DB::table('students')->where('first_name','John')->exists();

        // $students = DB::table('students')->distinct()->get();

        /**addSelect Example**/
        //$students = DB::table('students')->select('first_name');
        //$students = $students->addSelect('last_name')->get();

        /** Row Expression Example**/
        /*  $students = DB::table('students')
            ->select(DB::raw('count(*) as student_count, first_name, last_name'))
            ->groupBy('first_name')
            ->get();
        */

        /** Join Example **/
        /*$students = DB::table('students')
                    ->join('standards','students.standard','=','standards.id')
                    ->select('students.first_name','students.id',
                             'students.last_name',
                             'students.gender',
                             'students.hobbies',
                             'standards.name')
                    ->where('students.first_name','=','Jhon')
                    //->andWhere('students.id','>',10)
                    ->get();

        echo "<pre/>";print_r($students);exit;
        foreach ($students as $student) {
            print_r($student);
        }
        */

        /********* UNION Example *********/
        /*$noHobbies = DB::table('students')
                     ->whereNull('hobbies');

        $noProfilePic = DB::table('students')
                        ->whereNull('profile_picture')
                        ->union($noHobbies)
                        ->get();
        echo "<pre/>";print_r($noProfilePic);exit;
        exit;*/

        /******** WHERE CLAUSE **********/
        /************** AND where, OR where *******/
        /*$students = DB::table('students')
                    ->where([
                                ['students.id','<>',10],
                                ['students.id','>',10],
                            ])
                    ->orWhere('students.id',4)
                    ->get();*/

        /************** Where Between *******/
        /*$students = DB::table('students')
                    ->whereBetween('id',[6,10])
                    ->get();*/

        /************** Where Not Between *******/
        /*$students = DB::table('students')
                    ->whereNotBetween('id',[6,10])
                    ->get();*/

        /************** Where in  *******/
        /*$students = DB::table('students')
                    ->whereIn('id',[6,10])
                    ->get();*/

        /************** Where not in  *******/
        /*$students = DB::table('students')
                    ->whereNotIn('id',[6,10])
                    ->get();*/

        /************** Where Null  *******/
        /*$students = DB::table('students')
                    ->whereNull('hobbies')
                    ->get();*/

        /************** Where not in  *******/
        /*$students = DB::table('students')
                    ->whereNotNull('hobbies')
                    ->get();*/

        /************** Where column  *******/
        /*$students = DB::table('students')
                    ->whereColumn('first_name','last_name')
                    ->get();*/

        /************** Print Query  *******/
        /*$students = DB::table('students')
                    ->toSql();
        echo "<pre/>";print_r($students); exit;*/

        /*$students = DB::table('students')
            ->where('first_name', '=', 'vipul')
            ->orWhere(function ($query) {
                $query->where([
                            ['id', '>', 10],
                            ['last_name', '=', 'Smith']
                        ]);
            })
            ->toSql();*/

        /************* ORDER BY ******************/
        /*$students = DB::table('students')
                       ->orderBy('first_name','DESC')
                       ->get();*/

        /************* Latest ******************/
        /* $students = DB::table('students')
                       ->latest()
                       ->first();*/

        /************* oldest ******************/
        /* $students = DB::table('students')
                       ->oldest()
                       ->first();*/

        /************* Random Order ******************/
        /* $students = DB::table('students')
                       ->inRandomOrder()
                       ->first();

        echo "<pre/>";print_r($students); exit;*/


        // echo DB::table('students')->count();
        // echo "<br>";
        // echo DB::table('students')->max('id');
        // echo DB::table('students')->where('first_name','Jhon')->sum('id');
        // exit;
        // $users = DB::table('users')->where('first_name', 'Smith')->pluck('email');
        // echo "<pre/>";print_r($users); exit;
        // $users = DB::table('users')->get();
        /* foreach ($users as $user) {
            echo $user->first_name."----";
        }*/
        // echo "<pre/>";print_r($users);exit;
        // exit;
        //
        return new ViewResponse('backend.students.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateStudentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Student\CreateResponse
     */
    public function create(CreateStudentRequest $request)
    {
        return new CreateResponse('backend.students.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreStudentRequest $request)
    {

        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Student\Student  $student
     * @param  EditStudentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Student\EditResponse
     */
    public function edit(Student $student, EditStudentRequest $request)
    {
       return new EditResponse($student);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentRequestNamespace  $request
     * @param  App\Models\Student\Student  $student
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        echo "<pre/>";print_r($request->all());exit;
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $student, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteStudentRequestNamespace  $request
     * @param  App\Models\Student\Student  $student
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Student $student, DeleteStudentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($student);
        //returning with successfull message
        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.deleted')]);
    }

}
