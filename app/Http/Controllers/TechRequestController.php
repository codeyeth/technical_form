<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Events\FetchNewRequest;
use App\Events\RequestSent;

class TechRequestController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $techItemsCount = TechRequests::where('is_replied', 0)->orderBy('id', 'DESC')->count();
        $techItems = TechRequests::where('is_replied', 0)->orderBy('id', 'DESC')->paginate(5);
        
        return view ('welcome')->with('techItems', $techItems)->with('techItemsCount', $techItemsCount);
    }
    
    public function fetchRequests()
    {
        // return TechRequests::all();
        return TechRequests::where('is_replied', 0)->orderBy('id', 'DESC')->get();
    }
    
    public function requestList()
    {
        $requestListCount = TechRequests::where('is_replied', 1)->orderBy('attended_at', 'DESC')->count();
        $requestList = TechRequests::where('is_replied', 1)->orderBy('attended_at', 'DESC')->paginate(5);
        
        return view ('pages.requestList')->with('requestList', $requestList)->with('requestListCount', $requestListCount);
    }
    
    function showRequests(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query1');
            if($query != '')
            {
                $data = TechRequests::where('is_replied', 1)->orderBy('attended_at', 'DESC')->where('req_div', $query)->get();
            }
            else{
                $data = 0;
            }
            
            //SHOW MEMBER DUES TABLE
            $total_row = count($data);
            if($total_row > 0){
                $output .= 
                '
                <div class="user-profile__twoots-wrapper">
                
                <div class="requestCount">
                <h3 class="user-profile__username">Total Requests <b class="totalCount"> ( '. $total_row .'  ) </b> </h3>
                </div>
                ';
                foreach($data as $row){
                    $output .= 
                    ' 
                    <div class="twoot-item">
                    <div class="user-profile__twoot">
                    <div class="twoot-item__user">
                    ';
                    
                    $output .= '
                    <div class="twoot-item__content">
                    ';
                    
                    if($row->status == "Resolved"){
                        $output .= '
                        <span class="item_done">REQUEST RESOLVED</span>
                        ';
                    }elseif($row->status == "Unresolved"){
                        $output .= '
                        <span class="item_unresolved">REQUEST UNRESOLVED</span>
                        ';
                    }elseif($row->status == "Beyond Repair"){
                        $output .= '
                        <span class="item_beyond">BEYOND REPAIR</span>
                        ';
                    }
                    
                    $output .= 'TECH SUPPORT NO: <b> '.$row->ts_no.' . </b><hr/>';
                    
                    $output .= '</div>';
                    
                    $output .= 
                    '
                    <div class="twoot-item__content">
                    <div class="twoot-item__content1">
                    
                    <h3><u> Employee Request Information </u></h3>
                    DATE/TIME:
                    <b>
                    '. \Carbon\Carbon::parse($row->date)->toDayDateTimeString() .'
                    '. \Carbon\Carbon::parse($row->date)->diffForHumans() .'
                    </b>
                    
                    <br />
                    REQUESTING DIVISION/SECTION: <b> '.$row->req_div.' </b>
                    <br />
                    REQUESTING EMPLOYEE: <b> '.$row->req_emp.' </b>
                    <br />
                    PROBLEM CATEGORY: <b> '.$row->prob_cat.' </b>
                    <br />
                    DESCRIPTION: <b> '.$row->description.' </b>
                    
                    <hr>
                    
                    ATTENDED BY: <b> '.$row->attended_by.' </b>
                    <br />
                    ATTENDED AT: <b> 
                    '. \Carbon\Carbon::parse($row->attended_at)->toDayDateTimeString() .'
                    '. \Carbon\Carbon::parse($row->attended_at)->diffForHumans() .'
                    </b>
                    <br />
                    STATUS REPORT: <b> '.$row->status_report.' </b>
                    <br />
                    STATUS: <b> '.$row->status.' </b>
                    
                    </div>
                    </div>
                    ';
                    
                    $output .= 
                    '
                    </div>
                    </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $output = '
                <h1>No Data Found!</h1>
                ';
            }
            // <tr>
            // <td align="center" colspan="4">No Data Found</td>
            // </tr>
            $data = array(
                'data' => $output,
            );
            echo json_encode($data);
        }
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $incremental = TechRequests::count() + 1;
        
        $newTechRequest = new TechRequests;
        $newTechRequest->ts_no = 'ICTTSF_' . $now->year . $incremental;
        $newTechRequest->date = $now; //toDateString()
        $newTechRequest->req_div = Str::upper($request->input('reqDiv'));
        $newTechRequest->req_emp = Str::upper($request->input('reqEmp'));
        $newTechRequest->prob_cat = Str::upper($request->input('probCat'));
        $newTechRequest->description = Str::title($request->input('description'));
        $newTechRequest->save();
        
        //console log
        // broadcast(new FetchNewRequest($newTechRequest));
        
        broadcast(new RequestSent("Success!"));
        
        return back()->with('success', 'Request Creation Successful')->with('now', $now);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $requestEdit = TechRequests::find($id);
        return view('admin_request.editRequest')->with('requestEdit', $requestEdit);
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
        $now = Carbon::now();
        
        $requestUpdate = TechRequests::find($id);
        
        $requestUpdate->attended_by = $request->input('attBy');


        $requestUpdate->attended_at = $now;
        $requestUpdate->status_report = $request->input('statusReport');
        $requestUpdate->status = $request->input('status');
        
        $requestUpdate->is_replied = true;
        $requestUpdate->is_replied_at = $now;
        
        if( $requestUpdate->status != "Unresolved"){
            $requestUpdate->completed = true;
            $requestUpdate->completed_at = $now;
        }
        
        $requestUpdate->save();

        broadcast(new RequestSent("Success!"));
        
        return back()->with('success', 'Request Update Successful')->with('now', $now);
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
}
