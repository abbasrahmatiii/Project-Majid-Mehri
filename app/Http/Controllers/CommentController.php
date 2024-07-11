<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        Comment::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'approved' => false
        ]);
        // Set the flash message
        return back()->with('message', 'دیدگاه شما پس از بررسی منتشر خواهد شد.');
    }

    public function approve($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->approved = true;
        $comment->approved_at = now();
        $comment->approved_by = auth()->id();
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'نظر تایید شد.');
    }

    public function disapprove($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->approved = false;
        $comment->approved_at = null;
        $comment->approved_by = null;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'تایید نظر لغو شد.');
    }

    public function index()
    {

        $comments = Comment::with(['user', 'approver', 'replies'])->paginate(10);

        return view('admin.posts.comments.index', compact('comments'));
    }

    public function pending()
    {
        $comments = Comment::where('approved', false)->with('user')->paginate(10);
        return view('admin.posts.comments.pending', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'نظر با موفقیت حذف شد.');
    }
}
