<?php 

namespace App\Repositories;

use DB;
use Auth;
use Config;
use Session;
use DateTime;
use App\Post;


class PostRepository implements PostInterface
{
    /**
     * @var [Post]
     */
	protected $post;
	
    /**
     * Undocumented function
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
		
    }

    public function getAll()
    {
        return $this->post::all();
    }

    public function getById($id)
    {
        return $this->post::findOrFail($id);
    }

    public function save(Post $post, Array $inputs)
    {
        $post->title = $inputs['title'];
        $post->post = $inputs['post'];

        $post->save();

        return $post;
    }

    public function update($id, Array $inputs)
    {
        $this->post = $this->getById($id);

        $this->save($this->post, $inputs);
    }

    public function store(Array $inputs)
    {

        $post = new $this->post;

        $this->save($post, $inputs);

        return $post;
    }
}