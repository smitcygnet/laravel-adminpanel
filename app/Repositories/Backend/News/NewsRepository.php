<?php

namespace App\Repositories\Backend\News;

use DB;
use Carbon\Carbon;
use App\Models\News\News;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsRepository.
 */
class NewsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = News::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.news.table').'.id',
                config('module.news.table').'.created_at',
                config('module.news.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (News::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.news.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param News $news
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(News $news, array $input)
    {
    	if ($news->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.news.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param News $news
     * @throws GeneralException
     * @return bool
     */
    public function delete(News $news)
    {
        if ($news->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.news.delete_error'));
    }
}
