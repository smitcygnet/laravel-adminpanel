<?php

namespace App\Repositories\Backend\Sampleone;

use DB;
use Carbon\Carbon;
use App\Models\Sampleone\Sampleone;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SampleoneRepository.
 */
class SampleoneRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sampleone::class;

    protected $storage;

    protected $profile_pic_path;

    protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
     	$this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'sampleones'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'sampleones'.DIRECTORY_SEPARATOR;

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
                config('module.sampleones.table').'.id',
                config('module.sampleones.table').'.first_name',
				config('module.sampleones.table').'.datethree',
				config('module.sampleones.table').'.profile_pic',
				config('module.sampleones.table').'.profile_img',
                config('module.sampleones.table').'.created_at',
                config('module.sampleones.table').'.updated_at',
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
        $input['datethree'] = Carbon::parse($input['datethree']);

if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic']);
            }
if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img']);
            }
        if (Sampleone::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sampleones.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sampleone $sampleone
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sampleone $sampleone, array $input)
    {
        $input['datethree'] = Carbon::parse($input['datethree']);

        if(!empty($input['profile_pic'])) {
              $input['profile_pic'] = $this->uploadFormImg($input['profile_pic']);
          }
        if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img']);
            }
    	if ($sampleone->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sampleones.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sampleone $sampleone
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sampleone $sampleone)
    {
        if ($sampleone->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sampleones.delete_error'));
    }
}
