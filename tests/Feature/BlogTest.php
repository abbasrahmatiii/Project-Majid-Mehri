<?php

// tests/Feature/BlogTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function a_user_can_view_the_blog_index()
  {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/admin/posts/index');

    $response->assertStatus(200);
    $response->assertSee('لیست پست‌ها');
  }

  /** @test */
  public function a_user_can_create_a_post()
  {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user);

    $response = $this->post(route('posts.store'), [
      'title' => 'Test Post',
      'body' => 'This is the body',
      'summary' => 'This is a summary',
      'slug' => 'test-post',
      'image' => null,
      'category_id' => $category->id,
      'user_id' => $user->id,
      'published' => true,
      'views' => 0,
    ]);

    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
  }

  /** @test */
  public function a_user_can_edit_a_post()
  {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $post = Post::factory()->create([
      'user_id' => $user->id,
      'category_id' => $category->id,
    ]);

    $this->actingAs($user);

    $response = $this->put(route('posts.update', $post->id), [
      'title' => 'Updated Post Title',
      'body' => $post->body,
      'summary' => $post->summary,
      'slug' => $post->slug,
      'image' => $post->image,
      'category_id' => $post->category_id,
      'user_id' => $post->user_id,
      'published' => $post->published,
      'views' => $post->views,
    ]);

    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseHas('posts', ['title' => 'Updated Post Title']);
  }

  /** @test */
  public function a_user_can_delete_a_post()
  {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $post = Post::factory()->create([
      'user_id' => $user->id,
      'category_id' => $category->id,
    ]);

    $this->actingAs($user);

    $response = $this->delete(route('posts.destroy', $post->id));

    $response->assertRedirect(route('posts.index'));
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
  }
}
