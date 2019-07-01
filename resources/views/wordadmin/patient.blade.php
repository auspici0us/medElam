@extends('layouts.master')
@section('title','Word Admin')
@section('body')
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark ">

  	@if (session('success'))
  	    <div class="alert alert-success">
  	        {{ session('success') }}
  	    </div>
  	@endif
  	@if (session('failed'))
  	    <div class="alert alert-danger">
  	        {{ session('failed') }}
  	    </div>
  	@endif
    <ul class="navbar-nav">
      <li class="nav-item active">
        {{-- <a class="nav-link" href="{{url('/word_admin/assign_doctor/'.$patient->id)}}">Assign doctor</a> --}}
        <a href="#" class="nav-link" data-toggle="modal" data-target="#asssign_doctor_modal">
          Assign Doctor
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('patient_id_card/'.$patient->id)}}">Generate ID card</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>

</nav>
<div class="card">
	<div class="card-header">
	  Patient's info
	</div>
  <div class="card-body">
<div class="row">
	<div class="col-md-6">
		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>ID: </strong>{{$patient->id}} </li>
		  <li class="list-group-item"><strong>Name: </strong>{{$patient->user->name}} </li>
		  <li class="list-group-item"><strong>Phone: </strong>{{$patient->phone}} </li>
		  <li class="list-group-item"><strong>Email: </strong>{{$patient->user->email}} </li>
		  <li class="list-group-item"><strong>Address:</strong> {{$patient->address}}</li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>Word: </strong>{{$patient->word->title}} - {{$patient->word->department}} </li>
		  <li class="list-group-item"><strong>Bed: </strong>{{$patient->bed}} </li>
		  <li class="list-group-item"><strong>Age:</strong> {{$patient->age}}</li>
		  <li class="list-group-item"><strong>Attendant's name: </strong>{{$patient->attendants_name}} </li>
		  <li class="list-group-item"><strong>Attendant's phone: </strong>{{$patient->attendants_phone}} </li>
		</ul>
	</div>
</div>
  </div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
			  Assigned Doctor(s)
			</div>
		  <div class="card-body">
		<ol class="list-group list-group-flush">
			@php
				$i=0;
			@endphp
		@foreach($patient->doctors as $doctor)
		  <li class="list-group-item"><strong>{{++$i}}. </strong>{{$doctor->user->name}} </li>
		@endforeach
		  
		</ol>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
			  Patient's info
			</div>
		  <div class="card-body">
		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>Word: </strong>{{$patient->word->title}} - {{$patient->word->department}} </li>
		  <li class="list-group-item"><strong>Bed: </strong>{{$patient->bed}} </li>
		  <li class="list-group-item"><strong>Age:</strong> {{$patient->age}}</li>
		  <li class="list-group-item"><strong>Attendant's name: </strong>{{$patient->attendants_name}} </li>
		  <li class="list-group-item"><strong>Attendant's phone: </strong>{{$patient->attendants_phone}} </li>
		</ul>
		  </div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="asssign_doctor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Assign doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="{{url('/word_admin/assign_doctor')}}">
      <div class="modal-body">
      	@csrf
          <div class="form-group">
            <label for="patient">Patient</label>
            <input type="text" class="form-control" id="patient" value="{{$patient->user->name}}"  disabled>
            <input type="hidden"  name="patient" value="{{$patient->id}}">
            
          </div>
          <div class="form-group">
            <label for="doctor">Doctor</label>
            <select class="form-control" id="doctor" name="doctor">
            	<option>select</option>
            	@foreach(App\Doctor::all() as $doctor)
            	<option value="{{$doctor->id}}">{{$doctor->user->name}}</option>
            	@endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Assign</button>
      </div>
        </form>
    </div>
  </div>
</div>


@endsection