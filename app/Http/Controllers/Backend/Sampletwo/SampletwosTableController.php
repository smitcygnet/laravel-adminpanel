<?php

namespace App\Http\Controllers\Backend\Sampletwo;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Sampletwo\SampletwoRepository;
use App\Http\Requests\Backend\Sampletwo\ManageSampletwoRequest;

/**
 * Class SampletwosTableController.
 */
class SampletwosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampletwoRepository
     */
    protected $sampletwo;

    /**
     * contructor to initialize repository object
     * @param SampletwoRepository $sampletwo;
     */
    public function __construct(SampletwoRepository $sampletwo)
    {
        $this->sampletwo = $sampletwo;
    }

    /**
     * This method return the data of the model
     * @param ManageSampletwoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSampletwoRequest $request)
    {
        return Datatables::of($this->sampletwo->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sampletwo) {
                return Carbon::parse($sampletwo->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sampletwo) {
                return $sampletwo->action_buttons;
            })
            ->make(true);
    }
}
