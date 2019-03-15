<?php

namespace App\Repositories\Backend\Vision;

use DB;
use Carbon\Carbon;
use App\Models\Vision\Vision;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VisionRepository.
 */
class VisionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Vision::class;

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
                config('module.visions.table').'.id',
                config('module.visions.table').'.vision_name',
				config('module.visions.table').'.since',
				config('module.visions.table').'.notes',
				config('module.visions.table').'.company',
				config('module.visions.table').'.associated_roles',
				config('module.visions.table').'.dateone',
				config('module.visions.table').'.profile_pic',
                config('module.visions.table').'.created_at',
                config('module.visions.table').'.updated_at',
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

        if (Vision::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.visions.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Vision $vision
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Vision $vision, array $input)
    {
        $input['dateone'] = Carbon::parse($input['dateone']);

    	if ($vision->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.visions.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Vision $vision
     * @throws GeneralException
     * @return bool
     */
    public function delete(Vision $vision)
    {
        if ($vision->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.visions.delete_error'));
    }
}
