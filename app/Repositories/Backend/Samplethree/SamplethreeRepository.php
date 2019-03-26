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
                config('module.samplethrees.table').'.id',
                config('module.samplethrees.table').'.first_name',
				config('module.samplethrees.table').'.active',
				config('module.samplethrees.table').'.middle_name',
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

    

    public function removeImage(Samplethree $samplethree, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$samplethree->$field);
        $result = $samplethree->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
