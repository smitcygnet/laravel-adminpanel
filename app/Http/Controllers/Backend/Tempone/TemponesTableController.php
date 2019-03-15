<?php

namespace App\Http\Controllers\Backend\Tempone;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Tempone\TemponeRepository;
use App\Http\Requests\Backend\Tempone\ManageTemponeRequest;

/**
 * Class TemponesTableController.
 */
class TemponesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TemponeRepository
     */
    protected $tempone;

    /**
     * contructor to initialize repository object
     * @param TemponeRepository $tempone;
     */
    public function __construct(TemponeRepository $tempone)
    {
        $this->tempone = $tempone;
    }

    /**
     * This method return the data of the model
     * @param ManageTemponeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTemponeRequest $request)
    {
        return Datatables::of($this->tempone->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($tempone) {
                return Carbon::parse($tempone->created_at)->toDateString();
            })
            ->addColumn('actions', function ($tempone) {
                return $tempone->action_buttons;
            })
            ->make(true);
    }
}
