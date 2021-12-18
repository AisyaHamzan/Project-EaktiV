@extends('layouts.admin')

@section('content')
<div class="card">
    <div class ="card-header">
        <h4>Create Event</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-event')}} "method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

            <div class ="col-md-6 mb-3">
            <label for="">Event Name</label>
            <input type="text" class="form-control" name="event_name">
            </div>

            <div class="col-md-12 mb-3">
            <label for="">Description</label>
            <textarea name="description"rows="3"class="form-control"></textarea>
            </div>

            <div class="col-md-12 mb-3">
            <label for="">Committee Requirement</label>
            <textarea name="committee_requirement"rows="3"class="form-control"></textarea>
            </div>

            <div class ="col-md-6 mb-3">
            <label for="">Date</label>
            <input type="date" name="date">   
            </div>

            <div class="col-md-12 mb-3">
                <input type="file" name="image">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>



    </div>
</div>
    
@endsection