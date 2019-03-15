<?php

namespace App\Repositories\Backend\Student;

use DB;
use Carbon\Carbon;
use App\Models\Student\Student;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class StudentRepository.
 */
class StudentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Student::class;

    protected $storage;

    protected $student_profile_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->student_profile_path = 'img'.DIRECTORY_SEPARATOR.'students'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.students.table').'.id',
                config('module.students.table').'.first_name',
                config('module.students.table').'.last_name',
                config('module.students.table').'.gender',
                config('module.students.table').'.hobbies',
                config('module.students.table').'.profile_picture',
                config('module.students.table').'.standard',
                config('module.students.table').'.created_at',
                config('module.students.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
      if (!empty($input['profile_picture'])) {
         $input['profile_picture'] = $this->uploadProfileImg($input['profile_picture']);
      }

      if (Student::create($input)) {
         return true;
      }
       throw new GeneralException(trans('exceptions.backend.students.create_error'));
    }

   /*
    * Upload logo image
    */
    public function uploadProfileImg($profileImage)
    {
        $path = $this->student_profile_path;
        $image_name = time().$profileImage->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($profileImage->getRealPath()));
        return $image_name;
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Student $student
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Student $student, array $input)
    {
        if (!empty($input['profile_picture'])) {
            $this->removeProfilePicture($student, 'profile_picture');
            $input['profile_picture'] = $this->uploadProfileImg($input['profile_picture']);
        }

    	if ($student->update($input))
            return true;
        throw new GeneralException(trans('exceptions.backend.students.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Student $student
     * @throws GeneralException
     * @return bool
     */

    public function delete(Student $student)
    {
        if ($student->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.students.delete_error'));
    }
    /*
     * remove logo or favicon icon
     */
    public function removeProfilePicture(Student $student, $type)
    {
        $path = $this->student_profile_path;
        $this->storage->delete($path.$student->$type);
        $result = $student->update([$type => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
