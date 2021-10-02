<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostInterface;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentInterface;
use Illuminate\Support\Facades\Storage;


class CommentController extends Controller
{

    protected $postInterface;
    protected $commentInterface;
	

	public function __construct(PostInterface $postInterface, CommentInterface $commentInterface)
	{
		$this->postInterface = $postInterface;
        $this->commentInterface = $commentInterface;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        Storage::disk('local')->put('file.txt', 'je suis un super cool !');
        dd('bien');
        //On recherche si l'id du post existe
        $post_id = $request->all()['post_id'];
        $post = $this->postInterface->getById($post_id);
        if ($post) {
            $this->commentInterface->store($request->all());

            return \Redirect::route('chris.posts.show', [$post_id])->with('message', 'State saved correctly!!!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
