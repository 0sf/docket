
@extends('layouts.app')

@section('content')
<div class="card container">
  <div class="card-header text-center">
    <h3> New Task</h3>
  </div>
  <div class="card-body">
  <form action="/task" method="POST">
  @csrf
  <div class="form-group">
    <label for="course">Course</label>
    <select name="course" class="custom-select">
    <option value="1">Course 1</option>
    <option value="2">Course 2</option>
    <option value="3">Course 3</option>
    <option value="4">Course 4</option>
    </select>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="time" name="time" class="form-control @error('time') is-invalid @enderror"  >
    @error('time')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control @error('date') is-invalid @enderror"   name="date">
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="notification_type">Notification type</label>
    <select name="notification_type" class="custom-select @error('notification_type') is-invalid @enderror" >
    <option value="1">Notification 1</option>
    <option value="2">Notification 2</option>
    <option value="3">Notification 3</option>
    <option value="4">Notification 4</option>
    </select>
    @error('notification_type')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="content">Content</label>
  </div>
  <textarea name="content" id="" cols="100" rows="10" class="@error('content') is-invalid @enderror"></textarea>
  @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<div>
<input type="submit" class="btn btn-primary" value="submit" >
</div>

</form>


  </div>
</div>

@endsection