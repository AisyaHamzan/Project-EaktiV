<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('admin.events.index',compact('event'));
    }
    public function add(){
        return view('admin.events.add');
    }
    public function insert(Request $request){
        $event = new Event();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/event'.$filename);
            $event->image = $filename;
        }

        $event->event_name = $request->input('event_name');
        $event->description = $request->input('description');
        $event->committee_requirement = $request->input('committee_requirement');
        $event->date = $request->input('date');
        $event->save();
        return redirect('/dashboard')-> with('status',"Event Added Successfully");
    }
    public function edit($id){
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }
    public function update(Request $request, $id){
        $event = Event::find($id);
        if($request->hasFile('image'))
        {
            $path='assests/uploads/event/'.$event->image;
            if(file_exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/event'.$filename);
            $event->image = $filename;
        }
        $event->event_name = $request->input('event_name');
        $event->description = $request->input('description');
        $event->committee_requirement = $request->input('committee_requirement');
        $event->date = $request->input('date');
        $event->update();
        return redirect('dashboard')->with('status',"Event Updated Successfully");
    }
    public function destroy($id){
        $event = Event::find($id);
        if($event ->image){
            $path = 'assets/uploads/event'.$event->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $event->delete();
        return redirect('events')->with('status',"Event Deleted Successfully");
    }
}

