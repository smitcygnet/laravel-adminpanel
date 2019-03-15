<?php

namespace App\Repositories\Backend\Samplefive;

use DB;
use Carbon\Carbon;
use App\Models\Samplefive\Samplefive;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplefiveRepository.
 */
class SamplefiveRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Samplefive::class;

    protected $storage;

    protected $profile_pic_path;

    protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samplefives'.DIRECTORY_SEPARATOR.'profile_pic'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samplefives'.DIRECTORY_SEPARATOR.'profile_img'.DIRECTORY_SEPARATOR;

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
                config('module.samplefives.table').'.id',
                config('module.samplefives.table').'.first_name',
				config('module.samplefives.table').'.last_name',
				config('module.samplefives.table').'.age',
				config('module.samplefives.table').'.comment',
				config('module.samplefives.table').'.dropdown',
				config('module.samplefives.table').'.explaination',
				config('module.samplefives.table').'.gender',
				config('module.samplefives.table').'.associated_roles',
				config('module.samplefives.table').'.dataone',
				config('module.samplefives.table').'.datetwo',
				config('module.samplefives.table').'.datethree',
				config('module.samplefives.table').'.profile_pic',
				config('module.samplefives.table').'.profile_img',
                config('module.samplefives.table').'.created_at',
                config('module.samplefives.table').'.updated_at',
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
        if (Samplefive::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplefives.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Samplefive $samplefive
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Samplefive $samplefive, array $input)
    {
        $input['dataone']   = Carbon::parse($input['dataone']);
        $input['datetwo']   = Carbon::parse($input['datetwo']);
        $input['datethree'] = Carbon::parse($input['datethree']);

if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic'],'profile_pic_path');
            }
if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img'],'profile_img_path');
            }
    	if ($samplefive->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samplefives.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Samplefive $samplefive
     * @throws GeneralException
     * @return bool
     */
    public function delete(Samplefive $samplefive)
    {
        if ($samplefive->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplefives.delete_error'));
    }

    public function uploadFormImg($image,$field_path)
    {
        $path = $this->$field_path;
        $image_name = time().$image->getClientOriginalName();
        $this->storage->put($path.$image_name, file_get_contents($image->getRealPath()));
        return $image_name;
    }
}
