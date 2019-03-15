<?php

namespace App\Repositories\Backend\Temptwo;

use DB;
use Carbon\Carbon;
use App\Models\Temptwo\Temptwo;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TemptwoRepository.
 */
class TemptwoRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Temptwo::class;

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
                config('module.temptwos.table').'.id',
                config('module.temptwos.table').'.first_name',
				config('module.temptwos.table').'.last_name',
				config('module.temptwos.table').'.age',
				config('module.temptwos.table').'.comment',
				config('module.temptwos.table').'.dropdown',
				config('module.temptwos.table').'.explaination',
				config('module.temptwos.table').'.gender',
				config('module.temptwos.table').'.associated_roles',
				config('module.temptwos.table').'.dataone',
				config('module.temptwos.table').'.datetwo',
				config('module.temptwos.table').'.datethree',
				config('module.temptwos.table').'.profile_pic',
				config('module.temptwos.table').'.profile_img',
                config('module.temptwos.table').'.created_at',
                config('module.temptwos.table').'.updated_at',
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

        if (Temptwo::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.temptwos.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Temptwo $temptwo
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Temptwo $temptwo, array $input)
    {
        $input['dataone'] = Carbon::parse($input['dataone']);
$input['datetwo'] = Carbon::parse($input['datetwo']);
$input['datethree'] = Carbon::parse($input['datethree']);

    	if ($temptwo->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.temptwos.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Temptwo $temptwo
     * @throws GeneralException
     * @return bool
     */
    public function delete(Temptwo $temptwo)
    {
        if ($temptwo->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.temptwos.delete_error'));
    }
}
