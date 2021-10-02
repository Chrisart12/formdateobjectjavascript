<?php 

namespace App\Repositories;

use DB;
use Auth;
use Config;
use Session;
use DateTime;
use App\Comment;


class CommentRepository implements CommentInterface
{
    /**
     * @var [Comment]
     */
	protected $comment;
	
    /**
     * Undocumented function
     *
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
		
    }

    public function getAll()
    {
        return $this->comment::all();
    }

    public function getById($id)
    {
        return $this->comment::findOrFail($id);
    }

    public function save(Comment $comment, Array $inputs)
    {
        
        $comment->post_id = $inputs['post_id'];
        $comment->comment = $inputs['comment'];
        
        $comment->save();
        
        return $comment;
    }

    public function update($id, Array $inputs)
    {
        $this->comment = $this->getById($id);

        $this->save($this->comment, $inputs);
    }

    public function store(Array $inputs)
    {
        
        $comment = new $this->comment;
        
        $this->save($comment, $inputs);

        return $comment;
    }
}