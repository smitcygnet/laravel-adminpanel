<?php

namespace App\Http\Controllers\Backend\Sampleseven;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sampleseven\SamplesevenRepository;
use App\Http\Requests\Backend\Sampleseven\ManageSamplesevenRequest;

/**
 * Class SamplesevensTableController.
 */
class SamplesevensTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesevenRepository
     */
    protected $sampleseven;

    /**
     * contructor to initialize repository object
     * @param SamplesevenRepository $sampleseven;
     */
    public function __construct(SamplesevenRepository $sampleseven)
    {
        $this->sampleseven = $sampleseven;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplesevenRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplesevenRequest $request)
    {
        return Datatables::of($this->sampleseven->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sampleseven) {
                return Carbon::parse($sampleseven->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sampleseven) {
                return $sampleseven->action_buttons;
            })
            ->make(true);
    }
}
