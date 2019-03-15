<?php

namespace App\Http\Controllers\Backend\Samplefour;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Samplefour\SamplefourRepository;
use App\Http\Requests\Backend\Samplefour\ManageSamplefourRequest;

/**
 * Class SamplefoursTableController.
 */
class SamplefoursTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplefourRepository
     */
    protected $samplefour;

    /**
     * contructor to initialize repository object
     * @param SamplefourRepository $samplefour;
     */
    public function __construct(SamplefourRepository $samplefour)
    {
        $this->samplefour = $samplefour;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplefourRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplefourRequest $request)
    {
        return Datatables::of($this->samplefour->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($samplefour) {
                return Carbon::parse($samplefour->created_at)->toDateString();
            })
            ->addColumn('actions', function ($samplefour) {
                return $samplefour->action_buttons;
            })
            ->make(true);
    }
}
