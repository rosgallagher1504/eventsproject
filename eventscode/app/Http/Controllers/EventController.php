<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    public function AllEvent(){
        $events= Event::latest()->paginate(4);
        $trashEvent = Event::onlyTrashed()->latest()->paginate(3);
        return view('event.index', compact('events', 'trashEvent'));
    }

    public function AddEvent(Request $request){
        
            $validatedData = $request->validate([
                'event_name' => 'required|unique:events|max:255',
                'event_location'=>'required',
                'event_date'=>'required', //needs to be in a date format
                'event_description'=>'required',
                'covid_limit'=>'required', //needs to be a numeric value
               //'body' => 'required',
            ],
            [
                'event_name.required'=> 'Please Input Event Name',
                'event_name.max'=> 'Event Less Than 255 Chars',
            ]);

        Event::insert([
            'event_name' => $request->event_name,
            'user_id' => Auth::user()->id,
            'event_location' => $request->event_location,
            'event_date' => $request->event_date,
            'event_description' => $request->event_description,
            'covid_limit'=> $request->covid_limit,
            //'created at'=>Carbon::now()
         ]);

        // $event = new Event;
        // $event->event_name = $request->event_name;
        // $event->user_id = Auth::user()->id;
        // $event->event_location = $request->event_location;
        // $event->event_date = $request->event_date;
        // $event->event_description = $request->event_description;
        // $evnt->covid_limit = $request->covid_limit;
        // $event-> save();

        return Redirect()->back()->with('success', 'Event Added Successfully');
    
    }


    public function View($id) {
        $events = Event::find($id);
        $events = DB::table('events')->where('id',$id)->first();
        return view('event.view', compact('events'));
    }


    public function Edit($id){
        $events = Event::find($id);
        $events = DB::table('events')->where('id',$id)->first();
        return view('event.edit', compact('events'));
    }

    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'event_name' => 'required|unique:events|max:255',
            'event_location'=>'required',
            'event_date'=>'required', //needs to be in a date format
            'event_description'=>'required',
            'covid_limit'=>'required', //needs to be a numeric value
           //'body' => 'required',
        ],
        [
            'event_name.required'=> 'Please Input Event Name',
            'event_name.max'=> 'Event Less Than 255 Chars',
        ]);
        $update = Event::find($id)->update([
            'event_name'=>$request->event_name,
            'event_location'=>$request->event_location,
            'event_date'=>$request->event_date,
            'event_description'=>$request->event_description,
            'covid_limit'=>$request->covid_limit,
            'user_id'=> Auth::user()->id
        ]);

        return Redirect()->route('all.event')->with('success', 'Event Updated Successfully');
    }

    public function CancelUpdate(){
        return Redirect()->route('all.event');
    }

    public function SoftDelete($id){
        $delete = Event::find($id)->delete();
        return Redirect()->back()->with('success', 'Event Archived Successfully');
    }


    public function Restore($id){
        $restore = Event::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Event Restored Successfully');
    }


    public function PDelete($id){
        $delete = Event::onlyTrashed()-> find($id)->forcedelete();
        return Redirect()->back()->with('success', 'Event Permanetly Deleted');
    }

    public function Logout(){
        Auth::Logout();
        return Redirect()->route('login');
    }
}
