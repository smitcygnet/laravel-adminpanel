<?php

namespace App\Repositories\Backend\Comment;

use DB;
use Carbon\Carbon;
use App\Models\Comment\Comment;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentRepository.
 */
class CommentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Comment::class;

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
                config('module.comments.table').'.id',
                config('module.comments.table').'.created_at',
                config('module.comments.table').'.updated_at',
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
        if (Comment::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.comments.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Comment $comment
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Comment $comment, array $input)
    {
    	if ($comment->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.comments.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Comment $comment
     * @throws GeneralException
     * @return bool
     */
    public function delete(Comment $comment)
    {
        if ($comment->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.comments.delete_error'));
    }
}
