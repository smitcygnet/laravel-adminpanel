<?php

namespace App\Http\Controllers\Backend\Sample;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sample\SampleRepository;
use App\Http\Requests\Backend\Sample\ManageSampleRequest;

/**
 * Class SamplesTableController.
 */
class SamplesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampleRepository
     */
    protected $sample;

    /**
     * contructor to initialize repository object
     * @param SampleRepository $sample;
     */
    public function __construct(SampleRepository $sample)
    {
        $this->sample = $sample;
    }

    /**
     * This method return the data of the model
     * @param ManageSampleRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSampleRequest $request)
    {
        return Datatables::of($this->sample->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sample) {
                return Carbon::parse($sample->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sample) {
                return $sample->action_buttons;
            })
            ->make(true);
    }
}
