@extends('layouts.app')
@section('content')
@include('sidebar.dashboard')

    <div class="container">

        @foreach ($tasks as $task)
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card border-success" style="border-radius: 30pt">
                        <div class="card-header bg-success"
                            style="border-top-left-radius: 30pt; border-top-right-radius: 30pt;">
                            <div class="row">
                                <div class="col-md">
                                    <img src="..." alt="..." class="img-thumbnail">
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
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                @foreach ($completedTasks as $completedTask)
                                    @if ($user->id == $completedTask->user_id && $task->id == $completedTask->task_id)
                                        @php
                                            $clicked = true
                                        @endphp
                                        <button type="" disabled='true' class="btn btn-primary float-right bg-success toggleButton"
                                            onclick="toggleFunction()">Completed</button>
                                     @break
                                    @endif
                                @endforeach
        @if ($clicked == false)
            <button type="submit" class="btn btn-primary float-right bg-success toggleButton"
                onclick="toggleFunction()">Mark as Done</button>
        @endif
        {{ $clicked = false }}
        </form>
    </div>
    <div class=" card-footer">
        <div class=" row">

        <a class=" col-3 btn btn-info ml-5" href={{ url('task/edit/'.$task->id)}}>Edit</a>

        <button id="del" class=" col-3 btn btn-danger ml-5">Delete</button>
        </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach

{{-- <p class="task_created">{{ session('message') }}</p> --}}

    </div>
@if ($tasks->count()>0)
    <script>
    var del_btn=$('#del')
    del_btn.click(()=>{Swal.fire({
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
    del_btn.attr(href="{{'profile.destroy'}}")
    window.location.replace("{{ url('task/delete/'.$task->id)}}");
    window.location.replace("{{ url('/home')}}");
  }
})}
)
</script>
@endif
@endsection
