<?php

namespace App\Repositories\Backend\Samplesevennew;

use DB;
use Carbon\Carbon;
use App\Models\Samplesevennew\Samplesevennew;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplesevennewRepository.
 */
class SamplesevennewRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Samplesevennew::class;

    protected $storage;

protected $profile_pic_path;

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samplesevennews'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samplesevennews'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.samplesevennews.table').'.id',
                config('module.samplesevennews.table').'.first_name',
				config('module.samplesevennews.table').'.last_name',
				config('module.samplesevennews.table').'.age',
				config('module.samplesevennews.table').'.comment',
				config('module.samplesevennews.table').'.dropdown',
				config('module.samplesevennews.table').'.explaination',
				config('module.samplesevennews.table').'.gender',
				config('module.samplesevennews.table').'.associated_roles',
				config('module.samplesevennews.table').'.dataone',
				config('module.samplesevennews.table').'.datetwo',
				config('module.samplesevennews.table').'.datethree',
				config('module.samplesevennews.table').'.profile_pic',
				config('module.samplesevennews.table').'.profile_img',
                config('module.samplesevennews.table').'.created_at',
                config('module.samplesevennews.table').'.updated_at',
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
        $input['dataone'] = Carbon::parse($input['dataone']);
        $input['datetwo'] = Carbon::parse($input['datetwo']);
        $input['datethree'] = Carbon::parse($input['datethree']);

        if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic'],'profile_pic_path');
            }
        if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img'],'profile_img_path');
            }
        if (Samplesevennew::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplesevennews.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Samplesevennew $samplesevennew
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Samplesevennew $samplesevennew, array $input)
    {
        $input['dataone'] = Carbon::parse($input['dataone']);
$input['datetwo'] = Carbon::parse($input['datetwo']);
$input['datethree'] = Carbon::parse($input['datethree']);

if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic'],'profile_pic_path');
            }
if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img'],'profile_img_path');
            }
    	if ($samplesevennew->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samplesevennews.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Samplesevennew $samplesevennew
     * @throws GeneralException
     * @return bool
     */
    public function delete(Samplesevennew $samplesevennew)
    {
        if ($samplesevennew->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplesevennews.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        echo $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
