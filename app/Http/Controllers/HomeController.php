<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visit;
use App\Visitor;
use App\User_Visitor;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            return view('home')->with('user_count',User::all()->count())
                           ->with('visit_count',Visit::all()->count());
        }
        else
        {
            $visit_count = DB::table('visits')
                            ->join('user_visit','visits.id','=','user_visit.visit_id')
                            ->join('users', 'users.id', '=', 'user_visit.user_id')
                            ->where('user_visit.user_id',$id)->count();
            return view('home',[
                'visit_count' => $visit_count
            ]);
        }
    }

    public function error()
    {
        return view('error');
    }

   //search
    public function search()
    {
        $title = request('search');
        $query = request('search');

        $visitors = Visitor::all();
        $users = User::all();

        $visits = DB::table('visits')
                    ->join('user_visit','visits.id','=','user_visit.visit_id')
                    ->join('users', 'users.id', '=', 'user_visit.user_id')
                    ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                    ->select('visits.*','users.name','visitors.visitor_name')
                    ->where('users.name','like','%'.request('search').'%')->get();

        $visits1 = DB::table('visits')
                    ->join('user_visit','visits.id','=','user_visit.visit_id')
                    ->join('users', 'users.id', '=', 'user_visit.user_id')
                    ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
                    ->select('visits.*','users.name','visitors.visitor_name')
                    ->where('visitors.visitor_name','like','%'.request('search').'%')->get();

        return view('results.search')
                ->with('visits' , $visits)
                ->with('visits1' , $visits1)
                ->with('title' , $title)
                ->with('query', $query)
                ->with('visitors',$visitors)
                ->with('users',$users);
    }
}
