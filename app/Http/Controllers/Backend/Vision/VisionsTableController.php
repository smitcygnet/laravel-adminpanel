<?php

namespace App\Http\Controllers\Backend\Vision;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Vision\VisionRepository;
use App\Http\Requests\Backend\Vision\ManageVisionRequest;

/**
 * Class VisionsTableController.
 */
class VisionsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisionRepository
     */
    protected $vision;

    /**
     * contructor to initialize repository object
     * @param VisionRepository $vision;
     */
    public function __construct(VisionRepository $vision)
    {
        $this->vision = $vision;
    }

    /**
     * This method return the data of the model
     * @param ManageVisionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageVisionRequest $request)
    {
        return Datatables::of($this->vision->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($vision) {
                return Carbon::parse($vision->created_at)->toDateString();
            })
            ->addColumn('actions', function ($vision) {
                return $vision->action_buttons;
            })
            ->make(true);
    }
}
