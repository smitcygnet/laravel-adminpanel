<?php

namespace App\Repositories\Backend\Sampleseven;

use DB;
use Carbon\Carbon;
use App\Models\Sampleseven\Sampleseven;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplesevenRepository.
 */
class SamplesevenRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sampleseven::class;

    protected $storage;

protected $profile_pic_path;

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samplesevens'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samplesevens'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.samplesevens.table').'.id',
                config('module.samplesevens.table').'.first_name',
				config('module.samplesevens.table').'.last_name',
				config('module.samplesevens.table').'.age',
				config('module.samplesevens.table').'.comment',
				config('module.samplesevens.table').'.dropdown',
				config('module.samplesevens.table').'.explaination',
				config('module.samplesevens.table').'.gender',
				config('module.samplesevens.table').'.associated_roles',
				config('module.samplesevens.table').'.dataone',
				config('module.samplesevens.table').'.datetwo',
				config('module.samplesevens.table').'.datethree',
				config('module.samplesevens.table').'.profile_pic',
				config('module.samplesevens.table').'.profile_img',
                config('module.samplesevens.table').'.created_at',
                config('module.samplesevens.table').'.updated_at',
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
        if (Sampleseven::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplesevens.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sampleseven $sampleseven
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sampleseven $sampleseven, array $input)
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
    	if ($sampleseven->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samplesevens.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sampleseven $sampleseven
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sampleseven $sampleseven)
    {
        if ($sampleseven->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplesevens.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        echo $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
