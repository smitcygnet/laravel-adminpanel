<?php

namespace App\Http\Controllers\Backend\Life;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Life\LifeRepository;
use App\Http\Requests\Backend\Life\ManageLifeRequest;

/**
 * Class LivesTableController.
 */
class LivesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var LifeRepository
     */
    protected $life;

    /**
     * contructor to initialize repository object
     * @param LifeRepository $life;
     */
    public function __construct(LifeRepository $life)
    {
        $this->life = $life;
    }

    /**
     * This method return the data of the model
     * @param ManageLifeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLifeRequest $request)
    {
        return Datatables::of($this->life->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($life) {
                return Carbon::parse($life->created_at)->toDateString();
            })
            ->addColumn('actions', function ($life) {
                return $life->action_buttons;
            })
            ->make(true);
    }
}
