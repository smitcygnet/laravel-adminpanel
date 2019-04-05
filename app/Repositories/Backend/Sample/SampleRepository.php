<?php

namespace App\Repositories\Backend\Sample;

use DB;
use Carbon\Carbon;
use App\Models\Sample\Sample;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SampleRepository.
 */
class SampleRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sample::class;

    protected $storage;

protected $profile_pic_path;	

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samples'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;	

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samples'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

		$this->storage = Storage::disk("public");
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
                config('module.samples.table').'.id',
                config('module.samples.table').'.first_name',
				config('module.samples.table').'.amountt',
				config('module.samples.table').'.level',
				config('module.samples.table').'.comment',
				config('module.samples.table').'.explaination',
				config('module.samples.table').'.gender',
				config('module.samples.table').'.associated_roles',
				config('module.samples.table').'.dateone',
				config('module.samples.table').'.profile_pic',
				config('module.samples.table').'.profile_img',
                config('module.samples.table').'.created_at',
                config('module.samples.table').'.updated_at',
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
        $input['dateone'] = Carbon::parse($input['dateone']);

		if(!empty($input['profile_pic'])) {
$input['profile_pic'] = $this->uploadFormImg($input['profile_pic'],'profile_pic_path');
            }
		if(!empty($input['profile_img'])) {
$input['profile_img'] = $this->uploadFormImg($input['profile_img'],'profile_img_path');
            }
        if (Sample::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samples.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sample $sample
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sample $sample, array $input)
    {
        $input['dateone'] = Carbon::parse($input['dateone']);

		if(!empty($input['profile_pic'])) {

			$this->removeImage($sample, 'profile_pic_path', 'profile_pic');
$input['profile_pic'] = $this->uploadFormImg($input['profile_pic'],'profile_pic_path');
            }
		if(!empty($input['profile_img'])) {

			$this->removeImage($sample, 'profile_img_path', 'profile_img');
$input['profile_img'] = $this->uploadFormImg($input['profile_img'],'profile_img_path');
            }
    	if ($sample->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samples.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sample $sample
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sample $sample)
    {
        if ($sample->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samples.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }

    public function removeImage(Sample $sample, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$sample->$field);
        $result = $sample->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
