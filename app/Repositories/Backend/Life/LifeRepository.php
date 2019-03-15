<?php

namespace App\Repositories\Backend\Life;

use DB;
use Carbon\Carbon;
use App\Models\Life\Life;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LifeRepository.
 */
class LifeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Life::class;

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
                config('module.lives.table').'.id',
                config('module.lives.table').'.title',
				config('module.lives.table').'.comment',
				config('module.lives.table').'.dropdown',
				config('module.lives.table').'.explaination',
				config('module.lives.table').'.datethree',
				config('module.lives.table').'.profile_pic',
                config('module.lives.table').'.created_at',
                config('module.lives.table').'.updated_at',
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

        if (Life::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.lives.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Life $life
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Life $life, array $input)
    {
        $input['datethree'] = Carbon::parse($input['datethree']);

    	if ($life->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.lives.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Life $life
     * @throws GeneralException
     * @return bool
     */
    public function delete(Life $life)
    {
        if ($life->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.lives.delete_error'));
    }
}
