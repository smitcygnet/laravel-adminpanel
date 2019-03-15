<?php

namespace App\Http\Controllers\Backend\Samplesevennew;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Samplesevennew\SamplesevennewRepository;
use App\Http\Requests\Backend\Samplesevennew\ManageSamplesevennewRequest;

/**
 * Class SamplesevennewsTableController.
 */
class SamplesevennewsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesevennewRepository
     */
    protected $samplesevennew;

    /**
     * contructor to initialize repository object
     * @param SamplesevennewRepository $samplesevennew;
     */
    public function __construct(SamplesevennewRepository $samplesevennew)
    {
        $this->samplesevennew = $samplesevennew;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplesevennewRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplesevennewRequest $request)
    {
        return Datatables::of($this->samplesevennew->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($samplesevennew) {
                return Carbon::parse($samplesevennew->created_at)->toDateString();
            })
            ->addColumn('actions', function ($samplesevennew) {
                return $samplesevennew->action_buttons;
            })
            ->make(true);
    }
}
