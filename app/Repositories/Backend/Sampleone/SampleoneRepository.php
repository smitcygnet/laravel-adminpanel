<?php

namespace App\Repositories\Backend\Sampleone;

use DB;
use Carbon\Carbon;
use App\Models\Sampleone\Sampleone;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
                config('module.sampleones.table').'.id',
                config('module.sampleones.table').'.first_name',
				config('module.sampleones.table').'.active',
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



    public function removeImage(Sampleone $sampleone, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$sampleone->$field);
        $result = $sampleone->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
