<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $r, $id)
    {
        if(!Auth::check()) {
            session()->flash('error', 'Silahkan login terlebih dahulu untuk berkomentar');
            return redirect()->back();
        }

        $r->validate([
            'comment' => ['required']
        ]);

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'article_id' => $id,
            'comment' => $r->comment
        ]);

        session()->flash('success', 'Comment has been send!');
        return redirect()->back();
    }
}
