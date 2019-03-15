<?php

namespace App\Repositories\Backend\Samplesix;

use DB;
use Carbon\Carbon;
use App\Models\Samplesix\Samplesix;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplesixRepository.
 */
class SamplesixRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Samplesix::class;

    protected $storage;

protected $profile_pic_path;	

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samplesixs'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;	

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samplesixs'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.samplesixes.table').'.id',
                config('module.samplesixs.table').'.first_name',
				config('module.samplesixs.table').'.last_name',
				config('module.samplesixs.table').'.age',
				config('module.samplesixs.table').'.comment',
				config('module.samplesixs.table').'.dropdown',
				config('module.samplesixs.table').'.explaination',
				config('module.samplesixs.table').'.gender',
				config('module.samplesixs.table').'.associated_roles',
				config('module.samplesixs.table').'.dataone',
				config('module.samplesixs.table').'.datetwo',
				config('module.samplesixs.table').'.datethree',
				config('module.samplesixs.table').'.profile_pic',
				config('module.samplesixs.table').'.profile_img',
                config('module.samplesixes.table').'.created_at',
                config('module.samplesixes.table').'.updated_at',
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
        if (Samplesix::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplesixes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Samplesix $samplesix
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Samplesix $samplesix, array $input)
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
    	if ($samplesix->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samplesixes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Samplesix $samplesix
     * @throws GeneralException
     * @return bool
     */
    public function delete(Samplesix $samplesix)
    {
        if ($samplesix->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplesixes.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        echo $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
