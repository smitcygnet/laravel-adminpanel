<?php

namespace App\Http\Controllers\Backend\Testnew;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Testnew\TestnewRepository;
use App\Http\Requests\Backend\Testnew\ManageTestnewRequest;

/**
 * Class TestnewsTableController.
 */
class TestnewsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestnewRepository
     */
    protected $testnew;

    /**
     * contructor to initialize repository object
     * @param TestnewRepository $testnew;
     */
    public function __construct(TestnewRepository $testnew)
    {
        $this->testnew = $testnew;
    }

    /**
     * This method return the data of the model
     * @param ManageTestnewRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTestnewRequest $request)
    {
        return Datatables::of($this->testnew->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($testnew) {
                return Carbon::parse($testnew->created_at)->toDateString();
            })
            ->addColumn('actions', function ($testnew) {
                return $testnew->action_buttons;
            })
            ->make(true);
    }
}
