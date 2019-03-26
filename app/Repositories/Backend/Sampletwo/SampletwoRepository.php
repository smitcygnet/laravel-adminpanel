<?php

namespace App\Repositories\Backend\Sampletwo;

use DB;
use Carbon\Carbon;
use App\Models\Sampletwo\Sampletwo;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
                config('module.sampletwos.table').'.id',
                config('module.sampletwos.table').'.first_name',
				config('module.sampletwos.table').'.active',
				config('module.sampletwos.table').'.confirmed',
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

    

    public function removeImage(Sampletwo $sampletwo, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$sampletwo->$field);
        $result = $sampletwo->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
