<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use Response,DB;
use App\Visit;
use App\Visitor;
use App\User_Visitor;
use App\User;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin|super_admin|user']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$visits = Visit::orderBy('created_at','asc')->paginate(10);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            //$visits = Visit::orderBy('created_at','asc')->paginate(10);
            $visits = DB::table('visits')
                        ->join('user_visit','visits.id','=','user_visit.visit_id')
                        ->join('users','user_visit.user_id','=','users.id')
                        ->join('visitors','visits.visitor_id','=','visitors.id')
                        ->select('visits.*','visitors.visitor_name','users.name')
                        ->paginate(10);
        }
        else
        {
            $visits = DB::table('visits')
                        ->join('user_visit','visits.id','=','user_visit.visit_id')
                        ->join('users','user_visit.user_id','=','users.id')
                        ->join('visitors','visits.visitor_id','=','visitors.id')
                        ->select('visits.*','visitors.visitor_name','users.name')
                        ->where('users.id',$id)->paginate(10);
            /*$visits = Visit::orderBy('created_at','asc')->where('user_id',$id)->paginate(10);*/
        }
        
        $visitors = Visitor::all();
        $users = User::all();

        return view('visits.index',[
            'visits' => $visits,
            'visitors' => $visitors,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visit = new Visit();
        $visitors = Visitor::all();

        if($visitors->count()==0)
        {
            return redirect()->route('visitors.index');
        }

        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('user'))
        {

            return view('visits.create', [
                'visit' => $visit,
                'visitors' => $visitors
            ]);
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitRequest $request)
    {
        $visit = Visit::create([
                "visitor_id" => $request->visitor_id,
                "visit_goal" => $request->visit_goal,
                "visit_date" => $request->visit_date,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                //"user_id" => $request->user_id
            ]
        ); 

        
        //delete all relations from user_visitor table
        User_Visitor::where("visit_id",$visit->id)->get()->map(function ($item){
            $item->delete();
        });
        //add the relation between post and tag in post_tag table
        if($request->user_id)
        {
            User_Visitor::create([
                "user_id"=> $request->user_id,
                "visit_id" => $visit->id
            ]);
        }


        if ($visit)
        {
            $request->session()->flash("success" , "تم إضافة الزيارة بنجاح");
        }
        else
        {
            $request->session()->flash("error","عذرا حدث خطأ ما!");
        }

        return redirect()->route('visits.index');
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
        $visit = Visit::find($id);

        $visitors = Visitor::all();

        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('user'))
        {
            return view('visits.edit',[
                'visit' => $visit,
                'visitors' => $visitors
            ]);
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitRequest $request, $id)
    {
        $visit = Visit::find($id);

        $visit->visitor_id = $request->visitor_id;
        $visit->visit_goal = $request->visit_goal;
        $visit->visit_date = $request->visit_date;
        $visit->start_time = $request->start_time;
        $visit->end_time = $request->end_time;

        if($visit->update())
        {
            $request->session()->flash("success" , "تم تعديل الزيارة بنجاح");
        }
        else
        {
            $request->session()->flash("error","عذرا حدث خطأ ما!");
        }

        return redirect()->route('visits.index');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $visit = Visit::find($id);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('user'))
        {
            if($visit->delete())
            {
                
                //delete the relation between visit and user from user_visit table after delete visit
                User_Visitor::where("visit_id",$visit->id)->get()->map(function ($item){
                    $item->delete();
                });

            }

            return Response::json($visit);
        }
        else
        {
            return view('error');
        }
    }

    public function search()
    {

        $query = request('visitor_id');
        $title = request('visitor_id');

        $visitor = Visitor::find(request('visitor_id'));
        $user = User::find(request('user_id'));

        $id = Auth::user()->id;
       
        //search by school name
        $visits = DB::table('visits')
                    ->join('user_visit','visits.id','=','user_visit.visit_id')
                    ->join('users','user_visit.user_id','=','users.id')
                    ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                    ->select('visits.*','users.name','visitors.visitor_name')
                    ->where('users.id','=',request('user_id'))->get();

        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            //search by visitor name
            $visits1 = DB::table('visits')
                        ->join('user_visit','visits.id','=','user_visit.visit_id')
                        ->join('users', 'users.id', '=', 'user_visit.user_id')
                        ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                        ->select('visits.*','users.name','visitors.visitor_name')
                        ->where('visitors.id','=',request('visitor_id'))->get();
        }
        else
        {
            //search by visitor name
            $visits1 = DB::table('visits')
                        ->join('user_visit','visits.id','=','user_visit.visit_id')
                        ->join('users', 'users.id', '=', 'user_visit.user_id')
                        ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                        ->select('visits.*','users.name','visitors.visitor_name','users.id')
                        ->where(['visitors.id'=>request('visitor_id'),'users.id'=>$id])->get();
        }

        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            //search between two dates
            $visits2 = DB::table('visits')
                    ->join('user_visit','visits.id','=','user_visit.visit_id')
                    ->join('users', 'users.id', '=', 'user_visit.user_id')
                    ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                    ->select('visits.*','users.name','visitors.visitor_name')
                    ->whereBetween('visits.visit_date',[request('visit_date1'),
                        request('visit_date2')])->get();
        }
        else
        {
            //search between two dates
            $visits2 = DB::table('visits')
                    ->join('user_visit','visits.id','=','user_visit.visit_id')
                    ->join('users', 'users.id', '=', 'user_visit.user_id')
                    ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                    ->select('visits.*','users.name','visitors.visitor_name')
                    ->whereBetween('visits.visit_date',[request('visit_date1'),
                        request('visit_date2')])
                    ->where('users.id',$id)
                    ->get();
        }

        return view('results.search',[
            'visits' => $visits,
            'visits1' => $visits1,
            'visits2' => $visits2,
            'title' => $title,
            'query' => $query,
            'visitor' => $visitor,
            'user' => $user
            ]);     
    }
}
