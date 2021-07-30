@extends('layouts.app')
@section('content')
@if (Auth::user()->role_id == 1)
@include('sidebar.dashboard')
@else
@include('sidebar.dashboardUser')
@endif
<div class="container" style="position: absolute; top:20%; left:10%; width:85%">
    @foreach ($tasks as $task)
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card " style="border-radius: 30pt; border-color:#4889A3">
                <div class="card-header" style="border-top-left-radius: 30pt; border-top-right-radius: 30pt; background-color:#227CA0">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- <img src="..." alt="..." class="img-thumbnail"> -->
                            <i class="fa fa-bell" aria-hidden="true" style=""></i>
                        </div>
                        <div class="col-md-6 float-left text-light">
                            <h5 class="font-weight-bold">Assignment {{ $task->id }}</h5>
                            <h6 class="font-weight-bold">Course {{ $task->course }}</h6>
                        </div>
                        <div class="col-md-4 text-right text-light">
                            <h5 class="font-weight-bold">{{ $task->date }}</h5>
                            <h6 class="font-weight-bold">{{ $task->time }}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <img src="">
                    <h5 class="card-title font-weight-bold">{{ $task->title }}</h5>
                    <p class="card-text" aria-placeholder="Description">{{ $task->content }}</p>
                    <form action="/home" method="POST">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                        
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        @foreach ($completedTasks as $completedTask)
                        @if ($user->id == $completedTask->user_id && $task->id == $completedTask->task_id)
                        @php
                        $clicked = true
                        @endphp
                        <button type="" disabled='true' class="btn btn-primary float-right bg-success toggleButton" onclick="toggleFunction()">Completed</button>
                        @break
                        @endif
                        @endforeach
                        @if ($clicked == false)
                        <button type="submit" class="btn btn-primary float-right toggleButton" style="background-color: #193974" onclick="toggleFunction()">Mark as Done</button>
                        @endif
                        {{ $clicked = false }}
                    </form>
                </div>

                <div class=" card-footer">
                    @if ($user->role_id==1)
                    <div class=" row">


                        <a class=" col-3 btn btn-info ml-5" style="background-color:#288D1F; color:white" href={{ url('task/edit/'.$task->id)}}>Edit</a>

                        <button class=" del col-3 btn btn-danger ml-5">Delete</button>

                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    @endforeach

    {{-- <p class="task_created">{{ session('message') }}</p> --}}

</div>
@if (count($tasks) > 0)
<script>
    var del_btn = $('.del')
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
                del_btn.attr(href = "{{'task.destroy'}}")
                window.location.replace("{{ url('task/delete/'.$task->id)}}");
                window.location.replace("{{ url('/home')}}");
            }
        })
    });
</script>
@endif

@endsection