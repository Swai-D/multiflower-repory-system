<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      {

        $reports = Report::orderBy('created_at', 'desc')->get();
        return view('ReportBlade.index', compact('reports'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ReportBlade.create-report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
        'userId' => ['required', 'string'],
        'ReportSubject' => ['required', 'string'],
        'ReportBody' => ['required'],

      ]);


      $content = $request->ReportBody;

      $dom = new \DomDocument();
      $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      $imageFile = $dom->getElementsByTagName('img');

      if (isset($imageFile)) {

        return redirect()->back()->with('Message', 'Hey Image Uploads Are Not Enabled In This System, Please Write Only Plain Text, Thank You!');

        foreach($imageFile as $item => $image){

            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/Uploads/ReportImages/" . time().$item.'.png';
            $imgNameCode = time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            // It Took me weeks to figureout hoew to implement this function Praise the Lord
            // return $image;
            // $filePath = "Uploads/ReportImages/" .$imgNameCode;
            // Storage::disk('s3')->put($filePath, File::get(public_path('/Uploads/ReportImages/'.$imgNameCode)));
            // $filePath = Storage::disk('s3')->url($filePath);

            $image->removeAttribute('src');
            $image->setAttribute('src', $path);
            // $image->setAttribute('src', $filePath);
            //Delete Image From  Public Folder
            // File::delete([public_path('/Uploads/ReportImages/'.$imgNameCode),]);



         }
      }


          $content = $dom->saveHTML();
          $blog = Report::create([
            'userId' => $request->userId,
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'ReportSubject' => $request->ReportSubject,
            'ReportBody' => $content,

       ]);

     return redirect('/Multiflower-Report-System/home-page')->with('Message', 'Your Report was successfully Submited !');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report_id)
    {
        $report = Report::where('id', $report_id->id)->get();
        return view('ReportBlade.view-report', compact('report') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myReports()
    { $id = Auth::user()->id;
      // dd($id);
      $userReports = Report::where('userId', '=', $id)->get();
      return view('ReportBlade.my-reports', compact('userReports'));
    }

    public function reply()
    {
      return view('ReportBlade.reply');
    }
}
