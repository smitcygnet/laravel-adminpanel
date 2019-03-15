<?php

namespace App\Repositories\Backend\Tempone;

use DB;
use Carbon\Carbon;
use App\Models\Tempone\Tempone;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TemponeRepository.
 */
class TemponeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Tempone::class;

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
                config('module.tempones.table').'.id',
                config('module.tempones.table').'.first_name',
				config('module.tempones.table').'.last_name',
				config('module.tempones.table').'.age',
				config('module.tempones.table').'.comment',
				config('module.tempones.table').'.dropdown',
				config('module.tempones.table').'.explaination',
				config('module.tempones.table').'.gender',
				config('module.tempones.table').'.associated_roles',
				config('module.tempones.table').'.dataone',
				config('module.tempones.table').'.datetwo',
				config('module.tempones.table').'.datethree',
				config('module.tempones.table').'.profile_pic',
				config('module.tempones.table').'.profile_img',
                config('module.tempones.table').'.created_at',
                config('module.tempones.table').'.updated_at',
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

        if (Tempone::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.tempones.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Tempone $tempone
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Tempone $tempone, array $input)
    {
        $input['dataone'] = Carbon::parse($input['dataone']);
$input['datetwo'] = Carbon::parse($input['datetwo']);
$input['datethree'] = Carbon::parse($input['datethree']);

    	if ($tempone->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.tempones.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Tempone $tempone
     * @throws GeneralException
     * @return bool
     */
    public function delete(Tempone $tempone)
    {
        if ($tempone->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.tempones.delete_error'));
    }
}
