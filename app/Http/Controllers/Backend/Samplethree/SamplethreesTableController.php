<?php

namespace App\Http\Controllers\Backend\Samplethree;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Samplethree\SamplethreeRepository;
use App\Http\Requests\Backend\Samplethree\ManageSamplethreeRequest;

/**
 * Class SamplethreesTableController.
 */
class SamplethreesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplethreeRepository
     */
    protected $samplethree;

    /**
     * contructor to initialize repository object
     * @param SamplethreeRepository $samplethree;
     */
    public function __construct(SamplethreeRepository $samplethree)
    {
        $this->samplethree = $samplethree;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplethreeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplethreeRequest $request)
    {
        return Datatables::of($this->samplethree->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($samplethree) {
                return Carbon::parse($samplethree->created_at)->toDateString();
            })
            ->addColumn('actions', function ($samplethree) {
                return $samplethree->action_buttons;
            })
            ->make(true);
    }
}
