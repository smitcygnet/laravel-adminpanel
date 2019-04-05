<?php

namespace App\Repositories\Backend\Post;

use DB;
use Carbon\Carbon;
use App\Models\Post\Post;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostRepository.
 */
class PostRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Post::class;

    protected $storage;



    /**
     * Constructor.
     */
    public function __construct()
    {
        		

		$this->storage = Storage::disk("public");
    }

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
                config('module.posts.table').'.id',
                config('module.posts.table').'.title',
				config('module.posts.table').'.name',
				config('module.posts.table').'.comment',
                config('module.posts.table').'.created_at',
                config('module.posts.table').'.updated_at',
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
        
        if (Post::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.posts.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Post $post
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Post $post, array $input)
    {
        
    	if ($post->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.posts.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Post $post
     * @throws GeneralException
     * @return bool
     */
    public function delete(Post $post)
    {
        if ($post->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.posts.delete_error'));
    }

    

    public function removeImage(Post $post, $field_path, $field)
    {
        $path = $this->$field_path;
        $this->storage->delete($path.$post->$field);
        $result = $post->update([$field => null]);
        if ($result) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.settings.update_error'));
    }
}
