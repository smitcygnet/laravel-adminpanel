<?php

namespace App\Repositories\Backend\Samplethree;

use DB;
use Carbon\Carbon;
use App\Models\Samplethree\Samplethree;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class SamplethreeRepository.
 */
class SamplethreeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Samplethree::class;

    protected $storage;

    protected $profile_pic_path;

    protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        		$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'samples'.DIRECTORY_SEPARATOR;

		        $this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'samples'.DIRECTORY_SEPARATOR;

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
                config('module.samplethrees.table').'.id',
                config('module.samples.table').'.first_name',
				config('module.samples.table').'.last_name',
				config('module.samples.table').'.age',
				config('module.samples.table').'.comment',
				config('module.samples.table').'.dropdown',
				config('module.samples.table').'.explaination',
				config('module.samples.table').'.gender',
				config('module.samples.table').'.associated_roles',
				config('module.samples.table').'.dataone',
				config('module.samples.table').'.datetwo',
				config('module.samples.table').'.datethree',
				config('module.samples.table').'.profile_pic',
				config('module.samples.table').'.profile_img',
                config('module.samplethrees.table').'.created_at',
                config('module.samplethrees.table').'.updated_at',
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
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic']);
            }
if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img']);
            }
        if (Samplethree::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.samplethrees.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Samplethree $samplethree
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Samplethree $samplethree, array $input)
    {
        $input['dataone'] = Carbon::parse($input['dataone']);
$input['datetwo'] = Carbon::parse($input['datetwo']);
$input['datethree'] = Carbon::parse($input['datethree']);

if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic']);
            }
if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img']);
            }
    	if ($samplethree->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.samplethrees.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Samplethree $samplethree
     * @throws GeneralException
     * @return bool
     */
    public function delete(Samplethree $samplethree)
    {
        if ($samplethree->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.samplethrees.delete_error'));
    }
}
