<?php

namespace App\Repositories\Backend\Sampletwo;

use DB;
use Carbon\Carbon;
use App\Models\Sampletwo\Sampletwo;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SampletwoRepository.
 */
class SampletwoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sampletwo::class;

    protected $storage;

    protected $profile_pic_path;

    protected $profile_img_path;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->profile_pic_path = 'img'.DIRECTORY_SEPARATOR.'sampletwos'.DIRECTORY_SEPARATOR;

		$this->profile_img_path = 'img'.DIRECTORY_SEPARATOR.'sampletwos'.DIRECTORY_SEPARATOR;

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
                config('module.sampletwos.table').'.id',
                config('module.sampletwos.table').'.last_name',
				config('module.sampletwos.table').'.age',
				config('module.sampletwos.table').'.datethree',
				config('module.sampletwos.table').'.profile_pic',
				config('module.sampletwos.table').'.profile_img',
                config('module.sampletwos.table').'.created_at',
                config('module.sampletwos.table').'.updated_at',
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
        if (Sampletwo::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sampletwos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sampletwo $sampletwo
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sampletwo $sampletwo, array $input)
    {
        $input['datethree'] = Carbon::parse($input['datethree']);

        if(!empty($input['profile_pic'])) {
            $input['profile_pic'] = $this->uploadFormImg($input['profile_pic']);
        }

        if(!empty($input['profile_img'])) {
            $input['profile_img'] = $this->uploadFormImg($input['profile_img']);
        }

    	if ($sampletwo->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sampletwos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sampletwo $sampletwo
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sampletwo $sampletwo)
    {
        if ($sampletwo->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sampletwos.delete_error'));
    }
}
