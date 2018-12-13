<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Event;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $num = DB::table('events')->where('events.status','=','0')->count();
        View::share('num', $num);
    }

    public function index()
    {
        //
        //echo 'Fuck';
        Date::setLocale('th');
        App::setLocale('th');
        /* $list = Event::get(); */
        $list = DB::table('events')
            ->leftJoin('rooms','events.room_id','=','rooms.rid')
            ->get();
        //dd($list);
        /* $num = DB::table('events')->where('events.status','=','0')->count(); */
        return view('admin.list', compact('list','num'));
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
        //
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
    public function destroy(Event $list)
    {
        //dd($list);
        $list->delete();
        //return view('admin.list');
        //return($id);
        return redirect()->route('list.index');
    }

    public function check($id)
    {
        $event= \Laravel\Event::find($id);
        //dd($event);
        $event->status=('1');
        $event->save();
        return redirect('list');
    }

    public function uncheck($id)
    {
        $event= \Laravel\Event::find($id);
        //dd($event);
        $event->status=('2');
        $event->save();
        return redirect('list');
    }
}
