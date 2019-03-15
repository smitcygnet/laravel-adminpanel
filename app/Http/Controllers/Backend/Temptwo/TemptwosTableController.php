<?php

namespace App\Http\Controllers\Backend\Temptwo;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Temptwo\TemptwoRepository;
use App\Http\Requests\Backend\Temptwo\ManageTemptwoRequest;

/**
 * Class TemptwosTableController.
 */
class TemptwosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TemptwoRepository
     */
    protected $temptwo;

    /**
     * contructor to initialize repository object
     * @param TemptwoRepository $temptwo;
     */
    public function __construct(TemptwoRepository $temptwo)
    {
        $this->temptwo = $temptwo;
    }

    /**
     * This method return the data of the model
     * @param ManageTemptwoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTemptwoRequest $request)
    {
        return Datatables::of($this->temptwo->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($temptwo) {
                return Carbon::parse($temptwo->created_at)->toDateString();
            })
            ->addColumn('actions', function ($temptwo) {
                return $temptwo->action_buttons;
            })
            ->make(true);
    }
}
