<?php

namespace Laravel\Http\Controllers;

use Laravel\Event;
use Illuminate\Http\Request;
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
use DateTime;


class EventController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }
    public function index()
    {
        $events = [];
        /* $data = Event::get(); */
        $data = Event::where('status',1)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                //dd($value->start_date);
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
                     'url' => 'show/'.$value->id
                     /* 'url' => '#', */
                 ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)
        ->setOptions([
            'locale' => 'th',
            'slotLabelFormat' => 'H:mm',
            //'maxTime' => '24:00:00',
            //'nextDayThreshold' => '24:00:00',
            'timeFormat' => 'H:mm'
            ])
            ->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                /* 'eventClick' => 'function() {
                    $("#exampleModal").modal("show");
                    console.log("fuck");
                    console.log("fuck");
                 }' */
            ]); 
        //dd($calendar,$data,$events,$value);
        $room = Room::get();
        //dd($calendar);
       return view('event', compact('calendar','room'));
        
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
            return Redirect::to('/events')->withInput()->withErrors($validator);
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

    
    public function show($event)
    {
        Date::setLocale('th');
        $event = DB::table('events')
        ->leftJoin('rooms','events.room_id','=','rooms.rid')
        ->where('events.id','=',$event)
        ->get();
        //$event = Event::with('room')->where('events.id',$event)->get();
        //$event = Event::where('id','1');
        //$event = Event::where('id', $event);
        //$event = Event::find($event)->room();
        //$event = Event::where('id','=','1')->get();
        //dd($event);
        //$room = Event::find(1)->room;
        //dd($fuck);
        return view('show',compact('event'));
    }

    public function modal(Event $event)
    {
        Date::setLocale('th');
        //$fuck = Event::where('id',$key)->get();
        //$event = Event::where('id', $event) 
        //dd($event);
        return view('modal',compact('event'));
    }

    public function fuck(Event $event)
    {
        Date::setLocale('th');
        $view = View::make('modal', compact('event'));
        //$fuck = Event::where('id',$key)->get();
        //$event = Event::where('id', $event) 
        //dd($event);
        //return view('show',compact('event'));
        $contents = $view->render();
        //echo $view;
        //return view('fullcalendar2', compact('contents'));
        //return view('show', compact('event'));
    }

/*     public function edit(Event $event)
    {
        
        //$fuck = Event::where('id',$key)->get();
        //dd($id);
        return view('edit',compact('event'));
    } */
}
