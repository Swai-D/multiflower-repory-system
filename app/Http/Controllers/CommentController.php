<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Report $report, Request $request)
  {
      $data = $request->validate([
        'comment_body' => ['required', 'string', 'max:255'],

      ]);

      if (isset($data)) {
        $comment = new Comment();
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $report = Report::find($report->id);
        $report->comments()->save($comment);
        return back();
      }


  }
}
