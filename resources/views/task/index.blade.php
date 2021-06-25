@extends('layouts.app')
@section('content')
@include('sidebar.dashboard')

<div>
    @foreach($tasks as $task)
    {{$task->id}}-{{$task->title}}-{{$task->course}}-{{$task->date}}-{{$task->time}}-{{$task->notification_type}}-{{$task->content}}
    <br>
    {{--<ul>
@foreach($task->suppliers as $supplier)
<li>
{{$supplier}}
    </li>
    @endforeach
    </ul>
    --}}
    <br>
    @endforeach
    <p class="task_created">{{session('message')}}</p>
</div>


@endsection