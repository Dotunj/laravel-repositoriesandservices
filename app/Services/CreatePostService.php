<?php

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class CreatePostService
{
	public function __construct(PostRepository $post)
	{
		$this->post = $post ;
	}

	public function index()
	{
		return $this->post->all();
	}

	public function create(Request $request)
	{

		$post = Post::create([
         'title'=> $request->get('title'),
         'body'=> $request->get('body')
  ]);

		return $post;
	}

	public function read($id)
	{
     return $this->post->find($id);
	}

	public function update()
	{
		
	}


	public function delete($id)
	{
      return $this->post->delete($id);
	}

}