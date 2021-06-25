@extends('layouts.app')
@section('content')
@include('sidebar.dashboard')

<link rel="stylesheet" href="{{ asset('css/profileStyle.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>
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
                        <div class="col-md-12"><label class="labels" style="font-size: medium;">Name</label><input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="{{Auth::user()->name}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Index Number</label><input type="text" class="form-control" name="index_no" placeholder="Enter Your Index Number" value="{{Auth::user()->index_no}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Email Id</label><input type="text" class="form-control" name="email" placeholder="Enter Your Email Address" value="{{Auth::user()->email}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Faculty</label><input type="text" class="form-control" name="faculty" placeholder="Enter Your Faculty" value="{{Auth::user()->faculty}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Department</label><input type="text" class="form-control" name="department" placeholder="Enter Your Department" value="{{Auth::user()->department}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Phone Number</label><input type="text" class="form-control" name="phone_no" placeholder="Enter Your Phone Number" value="{{Auth::user()->phone_no}}"></div>
                        <div class="col-md-12"><label class="labels" style="font-size: medium;"><br>Select Image to Upload</label><br><input type="file" name="image" value="{{Auth::user()->image}}"></div>
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" value="update">Save Profile</button></div>
                </div>
            </div>

        </div>
    </div>
</form>
</div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection