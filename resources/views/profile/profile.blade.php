@extends('layouts.app')
@section('content')
@include('sidebar.dashboard')

<link rel="stylesheet" href="{{ asset('css/profileStyle.css') }}">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

<x-slot name="header">
    <h2 class="text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>
<div class="container-fluid" style="position: absolute; top:13%; left:18%; width:80%">
    <form data-parsley-validate class="" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">

                {{csrf_field()}}
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if (Auth::user()->image)

                        <img class="rounded-circle mt-5" style="width: 75%;" src={{('/upload/profiles/'.Auth::user()->image)}}><span class="font-weight-bold">

                            @else

                            <img class="no-image" style="width: 75%;" src="/upload/default/default.png" alt="No Picture">

                            @endif

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>

                        <div class="row mt-2">
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="col-md-12"><label class="labels" style="font-size: medium;">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Your Name" value="{{Auth::user()->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Index Number</label>
                                <input type="text" class="form-control @error('index_no') is-invalid @enderror" name="index_no" placeholder="Enter Your Index Number" value="{{Auth::user()->index_no}}">
                                @error('index_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Email Id</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email Address" value="{{Auth::user()->email}}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Faculty</label>
                                <input type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" placeholder="Enter Your Faculty" value="{{Auth::user()->faculty}}">
                                @error('faculty')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Department</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" placeholder="Enter Your Department" value="{{Auth::user()->department}}">
                                @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Phone Number</label>
                                <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" placeholder="Enter Your Phone Number" value="{{Auth::user()->phone_no}}">
                                @error('phone_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Select Image to Upload</label><br>
                                <input type="file" name="image" value="{{Auth::user()->image}}">
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" value="update">Save Profile</button></div>
                        <div class="mt-5 text-center"><a href="/show" class="btn btn-primary profile-button" type="submit">Skip</a></div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- </div>
</div> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection