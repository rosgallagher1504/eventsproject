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
        $events= Event::latest()->paginate(5);
        $trashEvent = Event::onlyTrashed()->latest()->paginate(3);
        return view('event.index', compact('events', 'trashEvent'));
    }

    public function AddEvent(Request $request){
        
            $validatedData = $request->validate([
                'event_name' => 'required|unique:posts|max:255',
                'body' => 'required',
            ],
            [
                'event_name.required'=> 'Please Input Event Name',
                'event_name.max'=> 'Event Less Than 255 Chars',
            ]);

        // Event::insert([
        //     'event_name' => $request-> event_name,
        //     'user_id' => Auth::user()->id,
        //     'created at'=>Carbon::now()
        // ]);

        $event = new Event;
        $event->event_name = $request->event_name;
        $event->user_id = Auth::user()->id;
        $event-> save();

        return Redirect()->back()->with('success', 'Event Inserted Successfully');
    
    }

    public function Edit($id){
        $events = Event::find($id);
        $events = DB::table('events')->where('id',$id)->first();
        return view('event.edit', compact('events'));
    }

    public function Update(Request $request, $id){
        $update = Event::find($id)->update([
            'event_name'=>$request->event_name,
            'user_id'=> Auth::user()->id
        ]);

        return Redirect()->route('all.event')->with('success', 'Event Updated Successfully');
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
}
