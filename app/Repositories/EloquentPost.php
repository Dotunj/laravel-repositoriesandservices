<?php

namespace App\Repositories;

use App\Post;

class EloquentPost implements PostRepository
{
    private $post;

    public function __construct(Post $post)
    {
    	$this->post = $post; 	
    }

    public function all();
  {
    return $this->post->all();
  }

  public function find($id)
  {
  	return $this->post->find($id);
  }

  public function create(array $attributes)
  {
  	return $this->post->create($attributes);
  }
   
   public function update($id, array $attributes)
   {
   	return $this->post->find($id)->update($attributes);
   }

   public function delete($id)
   {
   	return $this->post->find($id)->delete();
   }
}
