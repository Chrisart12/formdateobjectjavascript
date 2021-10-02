<?php

namespace App\Http\Controllers;

use Config;
use Validator;
use JavaScript;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostInterface;
use App\Repositories\ImageInterface;

use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    protected $postInterface;
    protected $imageInterface;
	

	public function __construct(PostInterface $postInterface, ImageInterface $imageInterface)
	{
		$this->postInterface = $postInterface;
        $this->imageInterface = $imageInterface;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postInterface->getAll();

        JavaScript::put([
            'projet_url' => Config::get('custom.projet_url'),
        ]);
       
        // dd($posts);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        JavaScript::put([
            'projet_url' => Config::get('custom.projet_url'),
        ]);

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response PostRequest
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'post' => 'required|min:10',
            'image' => 'nullable|max:10000|mimes:png,PNG,jpeg,jpg,JPG,JPEG',
        ]);
       

        if(!$validator->passes()) {

            return response()->json([
                'status'=> 0, 
                'error' => $validator->errors()->toArray()
            ]);

        } else {

            $post = $this->postInterface->store($request->all());

            // On vérifie si l'image existe
            if ($request->image) {

                // $date = new DateTime;

                $image = $request->image;

                $image_file_name = "image_" . time() . '.' . $image->extension();

                $file_path = "photo";
                
                // getClientOriginalExtension
                // $path = Storage::disk('local')->putFileAs($file_path, $image, $image_file_name);

                // $path = Storage::putFileAs($file_path, $image, $image_file_name);
                $path = Storage::disk('image_path')->putFileAs($file_path, $image, $image_file_name);
                
                // $path = $image->move($file_path, $image_file_name);

                // Je crée un tableau à partir des éléments à envoyer au model Image
                $inputs = [];
                $inputs['path'] = $image_file_name;
                $inputs['post_id'] = $post->id;

                $this->imageInterface->store($inputs);

                // On stocke l'image en base de données
                return response()->json([
                    'resultat' => $image_file_name,
                    // 'resultat' => "validé",
                ]);
            }

            return response()->json([
                'resultat' => gettype($request->all()),
                // 'resultat' => "validé",
            ]);
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
        $post = $this->postInterface->getById($id);
    
        return view('post.show', compact('post'));
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
