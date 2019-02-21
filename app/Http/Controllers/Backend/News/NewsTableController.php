<?php

namespace App\Http\Controllers\Backend\News;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\News\NewsRepository;
use App\Http\Requests\Backend\News\ManageNewsRequest;

/**
 * Class NewsTableController.
 */
class NewsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewsRepository
     */
    protected $news;

    /**
     * contructor to initialize repository object
     * @param NewsRepository $news;
     */
    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    /**
     * This method return the data of the model
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNewsRequest $request)
    {
        return Datatables::of($this->news->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($news) {
                return Carbon::parse($news->created_at)->toDateString();
            })
            ->addColumn('actions', function ($news) {
                return $news->action_buttons;
            })
            ->make(true);
    }
}
