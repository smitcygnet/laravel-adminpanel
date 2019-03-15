<?php

namespace App\Http\Controllers\Backend\Sampleone;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sampleone\SampleoneRepository;
use App\Http\Requests\Backend\Sampleone\ManageSampleoneRequest;

/**
 * Class SampleonesTableController.
 */
class SampleonesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampleoneRepository
     */
    protected $sampleone;

    /**
     * contructor to initialize repository object
     * @param SampleoneRepository $sampleone;
     */
    public function __construct(SampleoneRepository $sampleone)
    {
        $this->sampleone = $sampleone;
    }

    /**
     * This method return the data of the model
     * @param ManageSampleoneRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSampleoneRequest $request)
    {
        return Datatables::of($this->sampleone->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sampleone) {
                return Carbon::parse($sampleone->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sampleone) {
                return $sampleone->action_buttons;
            })
            ->make(true);
    }
}
