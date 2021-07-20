@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white bg-success">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>



            </div>
        </div>

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
                                        {{ $clicked = true }}
                                        <button type="" disabled='true' class="btn btn-primary float-right bg-success"
                                            id="toggleButton" onclick="toggleFunction()">Completed</button>
                                     @break
                                    @endif
                                @endforeach
        @if ($clicked == false)
            <button type="submit" class="btn btn-primary float-right bg-success" id="toggleButton"
                onclick="toggleFunction()">Mark as Done</button>
        @endif
        {{ $clicked = false }}
        </form>
    </div>
    </div>
    </div>
    </div>
    @endforeach

    <p class="task_created">{{ session('message') }}</p>

    </div>
@endsection
