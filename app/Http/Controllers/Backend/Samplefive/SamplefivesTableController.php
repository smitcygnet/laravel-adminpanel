<?php

namespace App\Http\Controllers\Backend\Samplefive;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Samplefive\SamplefiveRepository;
use App\Http\Requests\Backend\Samplefive\ManageSamplefiveRequest;

/**
 * Class SamplefivesTableController.
 */
class SamplefivesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplefiveRepository
     */
    protected $samplefive;

    /**
     * contructor to initialize repository object
     * @param SamplefiveRepository $samplefive;
     */
    public function __construct(SamplefiveRepository $samplefive)
    {
        $this->samplefive = $samplefive;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplefiveRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplefiveRequest $request)
    {
        return Datatables::of($this->samplefive->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($samplefive) {
                return Carbon::parse($samplefive->created_at)->toDateString();
            })
            ->addColumn('actions', function ($samplefive) {
                return $samplefive->action_buttons;
            })
            ->make(true);
    }
}
