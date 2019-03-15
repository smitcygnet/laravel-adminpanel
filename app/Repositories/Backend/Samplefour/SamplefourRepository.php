<?php

namespace App\Repositories\Backend\Samplefour;

use DB;
use Carbon\Carbon;
use App\Models\Samplefour\Samplefour;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplefourRepository.
 */
class SamplefourRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Samplefour::class;

    protected $storage;

protected $profile_pic_path;

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samplefours'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samplefours'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.samplefours.table').'.id',
                config('module.samplefours.table').'.first_name',
				config('module.samplefours.table').'.last_name',
				config('module.samplefours.table').'.age',
				config('module.samplefours.table').'.comment',
				config('module.samplefours.table').'.dropdown',
				config('module.samplefours.table').'.explaination',
				config('module.samplefours.table').'.gender',
				config('module.samplefours.table').'.associated_roles',
				config('module.samplefours.table').'.dataone',
				config('module.samplefours.table').'.datetwo',
				config('module.samplefours.table').'.datethree',
				config('module.samplefours.table').'.profile_pic',
				config('module.samplefours.table').'.profile_img',
                config('module.samplefours.table').'.created_at',
                config('module.samplefours.table').'.updated_at',
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
        if (Samplefour::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplefours.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Samplefour $samplefour
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Samplefour $samplefour, array $input)
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
    	if ($samplefour->update($input))
            return true;
        throw new GeneralException(trans('exceptions.backend.samplefours.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Samplefour $samplefour
     * @throws GeneralException
     * @return bool
     */
    public function delete(Samplefour $samplefour)
    {
        if ($samplefour->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplefours.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
