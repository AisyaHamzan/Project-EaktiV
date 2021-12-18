@extends('layouts.admin')

@section('content')
<div class="card">
    <div class ="card-header">
        <h4>Ediy/UpdateEvent</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-event/'.$event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

            <div class ="col-md-6 mb-3">
            <label for="">Event Name</label>
            <input type="text" value="{{$event-> event_name}}" class="form-control" name="event_name">
            </div>

            <div class="col-md-12 mb-3">
            <label for="">Description</label>
            <textarea name="description"rows="3"class="form-control">{{$event->description}}</textarea>
            </div>

            <div class="col-md-12 mb-3">
            <label for="">Committee Requirement</label>
            <textarea name="committee_requirement"rows="3"class="form-control">{{$event->committee_requirement}}</textarea>
            </div>

            <div class ="col-md-6 mb-3">
            <label for="">Date</label>
            <input type="date" value="{{$event-> date}}" name="date">   
            </div>
            @if($event->image)
            <img src="{{ asset('assets/uploads/event/'.$event->image) }}" alt="Event image">
            @endif
            <div class="col-md-12 mb-3">
                <input type="file" name="image">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>



    </div>
</div>
    
@endsection