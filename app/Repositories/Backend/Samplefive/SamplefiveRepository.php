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



    /**
     * Constructor.
     */
    public function __construct()
    {
        		

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
				config('module.samplefives.table').'.active',
				config('module.samplefives.table').'.middle_name',
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

    

    public function removeImage(Samplefive $samplefive, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$samplefive->$field);
        $result = $samplefive->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
