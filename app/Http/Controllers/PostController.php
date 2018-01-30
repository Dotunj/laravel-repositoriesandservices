<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController 
{ 
	protected $postservice;

	public function __construct(PostService $postservice)
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

      return back()->with(['status'=>'Post created successfully']);
    }

    public function read($id)
    {
       
       $post = $this->postservice->read($id);

       return view('edit', compact('post'));

       // dd($post);
    }

    public function update(PostRequest $request, $id)
    {

       $post = $this->postservice->update($request, $id);

      // dd($post);

     return redirect()->back()->with('status', 'Post has been updated succesfully');
    }

    public function delete($id)
    {
     $this->postservice->delete($id);

     return back()->with(['status'=>'Deleted successfully']);
    }
}
