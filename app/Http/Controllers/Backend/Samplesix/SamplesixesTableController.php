<?php

namespace App\Http\Controllers\Backend\Samplesix;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Samplesix\SamplesixRepository;
use App\Http\Requests\Backend\Samplesix\ManageSamplesixRequest;

/**
 * Class SamplesixesTableController.
 */
class SamplesixesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesixRepository
     */
    protected $samplesix;

    /**
     * contructor to initialize repository object
     * @param SamplesixRepository $samplesix;
     */
    public function __construct(SamplesixRepository $samplesix)
    {
        $this->samplesix = $samplesix;
    }

    /**
     * This method return the data of the model
     * @param ManageSamplesixRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSamplesixRequest $request)
    {
        return Datatables::of($this->samplesix->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($samplesix) {
                return Carbon::parse($samplesix->created_at)->toDateString();
            })
            ->addColumn('actions', function ($samplesix) {
                return $samplesix->action_buttons;
            })
            ->make(true);
    }
}
