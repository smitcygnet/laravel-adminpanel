<?php

namespace App\Repositories\Backend\Sampletemp;

use DB;
use Carbon\Carbon;
use App\Models\Sampletemp\Sampletemp;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SampletempRepository.
 */
class SampletempRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sampletemp::class;

    protected $storage;

protected $profile_pic_path;	

protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'sampletemps'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;	

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'sampletemps'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.sampletemps.table').'.id',
                config('module.sampletemps.table').'.first_name',
				config('module.sampletemps.table').'.last_name',
				config('module.sampletemps.table').'.age',
				config('module.sampletemps.table').'.comment',
				config('module.sampletemps.table').'.dropdown',
				config('module.sampletemps.table').'.explaination',
				config('module.sampletemps.table').'.gender',
				config('module.sampletemps.table').'.associated_roles',
				config('module.sampletemps.table').'.dataone',
				config('module.sampletemps.table').'.datetwo',
				config('module.sampletemps.table').'.datethree',
				config('module.sampletemps.table').'.profile_pic',
				config('module.sampletemps.table').'.profile_img',
                config('module.sampletemps.table').'.created_at',
                config('module.sampletemps.table').'.updated_at',
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
        if (Sampletemp::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sampletemps.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sampletemp $sampletemp
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sampletemp $sampletemp, array $input)
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
    	if ($sampletemp->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sampletemps.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sampletemp $sampletemp
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sampletemp $sampletemp)
    {
        if ($sampletemp->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sampletemps.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        echo $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
