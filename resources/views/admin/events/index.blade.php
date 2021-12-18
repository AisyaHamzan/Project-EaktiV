@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
         <h4>List Of Event</h4>
    </div>
    <div class="card-body">
       <table class ="table">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Event Name</th>
                   <th>Description</th>
                   <th>Committee Requirement</th>
                   <th>Date</th>
               </tr>
           </thead>
           <tbody>
                @foreach ($event as $item)
                    <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->event_name}}</td>
                    <td>{{ $item->description}}</td>
                    <td>{{ $item->committee_requirement}}</td>
                    <td>{{ $item->date}}</td>
                        <td>
                            <a href="{{url('edit-event/'. $item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('delete-event/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                 </tr>
                 @endforeach 
                     
                


           </tbody>
       </table>
        </div>
</div>
    
@endsection