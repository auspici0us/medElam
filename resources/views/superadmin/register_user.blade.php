@extends('layouts.master')
@section('title','Generate Label - Super admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register_user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                                <select onchange="checkUser()" id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type">
                                    <option>Select</option>
                                    <option value="1">Super Admin</option>
                                    {{-- <option value="2">Patient</option> --}}
                                    <option value="3">Doctor</option>
                                    <option value="4">Word Admin</option>
                                    <option value="5">Pharmacy Admin</option>
                                    <option value="6">Counter Admin</option>
                                    <option value="7">Lab Admin</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="additional">
                        	
                        </div>
                        @php
                        	$words=App\Word::all();
                        	// dd($words);
                        @endphp
                        <script>
                        	function checkUser(){
                        	var addi= $('#additional');
                                addi.empty();
                        		// console.log($('#type').val());
                        		if($('#type').val()==4){
                        			addi.append(
                        				`<div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Word') }}</label>

                            <div class="col-md-6">
                                <select  id="word" class="form-control @error('type') is-invalid @enderror" name="word" required autocomplete="type">
                                    <option>Select</option>
                                    @foreach($words as $word)
                                    <option value="{{$word->id}}">{{$word->title." - ".$word->department}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        				`
                        				);
                        		}else if($('#type').val()==3){
                                    addi.append(
                                        `<div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <input type='text'  id="department" class="form-control @error('department') is-invalid @enderror" name="department" required autocomplete="department"/>
                            </div>
                        </div>
                                        `
                                        );
                                }
                                else if($('#type').val()==6){
                                    addi.append(
                                        `<div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Counter') }}</label>

                            <div class="col-md-6">
                                <input type='text'  id="counter" class="form-control @error('counter') is-invalid @enderror" name="counter" required autocomplete="counter"/>
                            </div>
                        </div>
                                        `
                                        );
                                }
                        	}
                        </script>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection