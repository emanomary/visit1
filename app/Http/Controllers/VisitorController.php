<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Visitor;
use Response,DB;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin|super_admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::orderBy('created_at','asc')->paginate(10);
        
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
           
            return view('visitors.index',[
                'visitors' => $visitors,

            ]);
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitor = new Visitor();
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            return view('visitors.create', [
                'visitor' => $visitor
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
    public function store(StoreVisitorRequest $request)
    {
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            $visitor = Visitor::create([
                "visitor_name" => $request->visitor_name,
                "job" => $request->job
            ]
            ); 

            if ($visitor)
            {
                $request->session()->flash("success" , "تم إضافة الزائر بنجاح");
            }
            else
            {
                $request->session()->flash("error","عذرا حدث خطأ ما!");
            }

            return redirect()->route('visitors.index');
        }
        else
        {
            return view('error');
        }

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
        $visitor = Visitor::find($id);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            return view('visitors.edit',[
                'visitor' => $visitor
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
    public function update(UpdateVisitorRequest $request, $id)
    {
        
            $visitor = Visitor::find($id);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            $visitor->visitor_name = $request->visitor_name;
            $visitor->job = $request->job;
            
            if($visitor->update())
            {
                $request->session()->flash("success" , "تم تعديل الزائر بنجاح");
            }
            else
            {
                $request->session()->flash("error","عذرا حدث خطأ ما!");
            }

            return redirect()->route('visitors.index');
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::find($id);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            if($visitor)
            {
                $visitor->delete();
            }

            return Response::json($visitor);
        }
        else
        {
            return view('error');
        }    
    }
}
