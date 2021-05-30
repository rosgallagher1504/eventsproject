<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class EventController extends Controller
{
    public function AllEvent(){
        $events= Event::latest()->paginate(4);
        $trashEvent = Event::onlyTrashed()->latest()->paginate(2);
        return view('event.index', compact('events', 'trashEvent'));
    }

    public function UserEvents(){
        $events = DB::table('events')
        ->join('event_user', 'event_user.event_id','=','events.id')
        ->join('users', 'users.id', '=', 'event_user.user_id')
        ->where('event_user.user_id', Auth::user()->id)
        ->get();

        return view('myevents', compact('events'));
    }

    public function AddEvent(Request $request){
        
            $validatedData = $request->validate([
                'event_name' => 'required|unique:events|max:255',
                'event_location'=>'required',
                'event_date'=>'required', 
                'event_description'=>'required',
                'covid_limit'=>'required',
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
         ]);

        return Redirect()->back()->with('success', 'Event Added Successfully');
    
    }


    public function View($id) {
        $events = Event::find($id);
        $events = DB::table('events')->where('id',$id)->first();
        return view('event.view', compact('events'));
    }

    //take an event and register a user to it
    public function Register($id){
        $events = Event::find($id);
        $user = Auth::user()->id;

        if($user){
            $events->users()->attach($user);
        }

        return Redirect()->back()->with('success', 'You have successfully Registered for this Event');
    
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
            'event_date'=>'required',
            'event_description'=>'required',
            'covid_limit'=>'required', 
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
