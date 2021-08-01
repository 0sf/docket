@extends('layouts.app')
@section('content')

@if (Auth::user()->role_id == 1)
@include('sidebar.dashboard')
@else
@include('sidebar.dashboardUser')
@endif


<div class="container-fluid position-absolute" style=" top:25%; left:20%; width:60%">

    <div class="row">
        <div class="col-lg-3">
            @if (Auth::user()->image)

            <img src="{{('/upload/profiles/'.Auth::user()->image)}}" class="rounded-circle mt-5" width="90%" style="position: relative; left:25%;  top:15%">

            @else

            <img class="no-image" width="350" style="position: relative; left:25%;  top:10%; margin-left:5%" src="/upload/default/default.png" alt="No Picture">

            @endif
            <!-- <img src={{('/upload/profiles/'.Auth::user()->image)}} class="img-thumbnail" width="400" style="position: relative; left:800px; top:50px"> -->
        </div>

        <div class="col-lg-9 mt-3" style="left:18%">
            <table style="font-size: large; margin-left:30%;  margin-top:5%;">
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

            <div class="col-lg-6" style="left: 20%;">
                <div class="row" style="position:relative; text-align:center;">
                    <div class="col-sm-6 mt-3">
                        <a href={{ url('edit/'.Auth::user()->id)}}><button class="btn btn-lg btn-block" style="background-color:#288D1F; color:white">Edit</button></a>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <a id="del" class="btn btn-lg btn-block" style="background-color:#a30c0c; color:white">Delete</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var del_btn = $('#del')
    del_btn.click(() => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    del_btn.attr(href = "{{'profile.destroy'}}")
                    window.location.replace("{{ url('delete/'.Auth::user()->id)}}");
                }
            })
        }

    )
</script>


@endsection