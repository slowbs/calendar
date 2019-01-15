<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Event;
use Illuminate\Support\Facades\Redirect;
use Laravel\Http\Controllers\Controller;
use Auth;
use Laravel\Room;
use Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('admin');
        $num = DB::table('events')->where('events.status','=','0')->count();
        View::share('num', $num);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $events = [];
            $data = Event::where('status',1)->get();
            if($data->count()) {
                foreach ($data as $key => $value) {
                    if($value->room_id == 1){
                        $color = 'green';
                    }
                    else{
                        $color = 'red';
                    }
                    $events[] = Calendar::event(
                        $value->title,
                        true,
                        new \DateTime($value->start_date.$value->start_time),
                        new \DateTime($value->end_date.$value->end_time),
                        $value->id,
                        // Add color and link on event
                    [
                         'color' => $color,
                         'allDay' => false,
                         'url' => 'edit/'.$value->id,
                         /* 'url' => '#', */
                     ]
                    );
                }
            }
            $calendar = Calendar::addEvents($events)
            ->setOptions([
                'locale' => 'th',
                'slotLabelFormat' => 'H:mm',
                'timeFormat' => 'H:mm'
                ])
                ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                    'eventClick' => 'function() {
                        /* $("#exampleModal").modal("show"); */
                        /* console.log("fuck"); */
                        /* console.log("fuck"); */
                     }'
                ]); 
            //dd($calendar,$data,$events,$value);
            $room = Room::get();
            /* $num = DB::table('events')->where('events.status','=','0')->count(); */
            //dd($num);
            return view('admin.event', compact('calendar','room'));
            
        }

        public function edit($id)
        {
            Date::setLocale('th');
            //$fuck = Event::where('id',$key)->get();
            $event = DB::table('events')
            ->leftJoin('rooms','events.room_id','=','rooms.rid')
            ->where('events.id','=',$id)
            ->get();
            //$id = Event::find($id)->room;
            //dd($event);
            $room = Room::get();
            return view('admin.edit',compact('event','room'));
        }

        public function updateEvent(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'event_name' => 'required',
            'describe' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_id' => 'required',
        ]);
 
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/edit/'.$id)->withInput()->withErrors($validator,'editerror');
        }


        //dd($id);
        $event= \Laravel\Event::find($id);
        $event->name=$request->get('event_name');
        $event->title=$request->get('title');
        $event->describe=$request->get('describe');
        $event->start_date = $request->get('start_date');
        $event->end_date = $request->get('end_date');
        $event->start_time = $request->get('start_time');
        $event->end_time = $request->get('end_time');
        $event->room_id = $request->get('room_id');
        /* $passport->office=$request->get('office'); */
        $event->save();
        return redirect('home');
        //$event = 5;
        //dd($event);
        //return view('home');
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'name' => 'required',
            'describe' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_id' => 'required',
        ]);
 
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/home')->withInput()->withErrors($validator,'eventerror');
        }
 
        $event = new Event;
        $event->title = $request['title'];
        $event->name = $request['name'];
        $event->describe = $request['describe'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->start_time = $request['start_time'];
        $event->end_time = $request['end_time'];
        $event->room_id = $request['room_id'];
        $event->save();
 
        /* \Session::flash('success','Event added successfully.'); */
        return Redirect::to('/events');
    }
}
