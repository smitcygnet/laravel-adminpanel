<?php

namespace App\Http\Controllers\Backend\Sampletemp;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sampletemp\SampletempRepository;
use App\Http\Requests\Backend\Sampletemp\ManageSampletempRequest;

/**
 * Class SampletempsTableController.
 */
class SampletempsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampletempRepository
     */
    protected $sampletemp;

    /**
     * contructor to initialize repository object
     * @param SampletempRepository $sampletemp;
     */
    public function __construct(SampletempRepository $sampletemp)
    {
        $this->sampletemp = $sampletemp;
    }

    /**
     * This method return the data of the model
     * @param ManageSampletempRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSampletempRequest $request)
    {
        return Datatables::of($this->sampletemp->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sampletemp) {
                return Carbon::parse($sampletemp->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sampletemp) {
                return $sampletemp->action_buttons;
            })
            ->make(true);
    }
}
