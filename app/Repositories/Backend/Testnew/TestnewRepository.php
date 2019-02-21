<?php

namespace App\Repositories\Backend\Testnew;

use DB;
use Carbon\Carbon;
use App\Models\Testnew\Testnew;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestnewRepository.
 */
class TestnewRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Testnew::class;

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
                config('module.testnews.table').'.id',
                config('module.testnews.table').'.created_at',
                config('module.testnews.table').'.updated_at',
            ]);
    }

}
