<?php 

namespace App\Repositories;

use DB;
use Auth;
use Config;
use Session;
use DateTime;
use App\Image;


class ImageRepository implements ImageInterface
{
    /**
     * @var [Image]
     */
	protected $image;
	
    /**
     * Undocumented function
     *
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
		
    }

    public function getAll()
    {
        return $this->image::all();
    }

    public function getById($id)
    {
        return $this->image::findOrFail($id);
    }

    public function save(Image $image, Array $inputs)
    {
        $image->path = $inputs['path'];
        $image->post_id = $inputs['post_id'];

        $image->save();

        return $image;
    }

    public function update($id, Array $inputs)
    {
        $this->image = $this->getById($id);

        $this->save($this->image, $inputs);
    }

    public function store(Array $inputs)
    {

        $image = new $this->image;

        $this->save($image, $inputs);

        return $image;
    }
}