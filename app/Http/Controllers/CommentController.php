<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\NewComment;
use App\Http\Requests\CommentStoreRequest;
use App\Mail\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('comment.create');
    }

    /**
     * @param \App\Http\Requests\CommentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->all());

        event(new NewComment($comment));

        Mail::send(new CommentCreated($comment));

        $request->session()->flash('message', 'The real message...');

        return redirect()->route('comment.create');
    }
}
