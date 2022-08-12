<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use App\Models\DirectMessage;
use DB;


class DirectMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactList = User::where('id', '!=', auth()->id())->get();
        return view('DirectMessageBladeFiles.contacts-list', compact('contactList'));
    }

    public function replyReport(Report $report)
    {
      $replyReport = Report::where('id', $report->id)->get();
      return view('DirectMessageBladeFiles.reply', compact('replyReport'));
    }

}
