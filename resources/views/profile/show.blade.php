@extends('layouts.app')
@section('content')
@include('sidebar.dashboard')

<div class="row">
    <div class="col-lg-3">
     @if (Auth::user()->image)

                    <img src="{{('/upload/profiles/'.Auth::user()->image)}}" class="rounded-circle mt-5" width="90%" style="position: relative; left:750px; top:10px">

                    @else

                    <img class="no-image" width="350" style="position: relative; left:800px; top:50px"  src="/upload/default/default.png" alt="No Picture">

                    @endif
        <!-- <img src={{('/upload/profiles/'.Auth::user()->image)}} class="img-thumbnail" width="400" style="position: relative; left:800px; top:50px"> -->
    </div>
    <div class="col-lg-9">
        <table style="font-size: large; margin-left:-20%;  margin-top:2%;">
            <tr style="line-height: 50px;">
                <td><b>Name</b></td>
                <td>&nbsp;: {{Auth::user()->name}}</td><br>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Index Number</b></td>
                <td>&nbsp;: {{Auth::user()->index_no}}</td>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Email Id</b></td>
                <td>&nbsp;: {{Auth::user()->email}}</td>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Faculty</b></td>
                <td>&nbsp;: {{Auth::user()->faculty}}</td>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Department</b></td>
                <td>&nbsp;: {{Auth::user()->department}}</td>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Phone Number</b></td>
                <td>&nbsp;: {{Auth::user()->phone_no}}</td>
            </tr>

            <tr style="line-height: 50px;">
                <td><b>Created At</b></td>
                <td>&nbsp;: {{date('M j, Y H:i',strtotime(Auth::user()->created_at))}}</td>
            </tr>
            <tr style="line-height: 50px;">
                <td><b>Last Updated</b></td>
                <td>&nbsp;: {{date('M j, Y H:i',strtotime(Auth::user()->updated_at))}}</td>
            </tr>
        </table><br>

        <div class="col-md-6 ">
            <div class="row" style="position:relative; text-align:center;">
                <div class="col-sm-6">
                    <a href={{ url('edit/'.Auth::user()->id)}}><button class="btn btn-lg btn-success btn-block">Edit</button></a>
                </div>
                <div class="col-sm-6">
                    <a href={{ url('delete/'.Auth::user()->id)}} action="{{'profile.destroy'}}" class="btn btn-danger btn-lg btn-block">Delete</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection