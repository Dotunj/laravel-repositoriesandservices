<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Services\CreatePostService;

class PostController 
{ 
	protected $postservice;

	protected $postrepository;

	public function __construct(CreatePostService $postservice)
	{
		$this->postservice = $postservice;
	}
    public function index(){
       
         $posts = $this->postservice->index();
         //dd($posts);

    	return view('index', compact('posts'));
    }

    public function create(PostRequest $request)
    {
      
      $this->postservice->create($request);

      return back()->with(['status'=>'success']);
    }

    public function read($id)
    {
       
       $post = $this->postservice->read($id);

       dd($post);
    }

    public function update(PostRequest $request)
    {

    }

    public function delete()
    {

    }
}
