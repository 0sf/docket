@extends('layouts.app')

@section('content')
<div class="card container">
  <div class="card-header text-center">
    <h3> New Task</h3>
  </div>
  <div class="card-body">
  <form >
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
    <input type="text" class="form-control"  >
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="time" name="time" class="form-control"  >
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control"  >
  </div>
  <div class="form-group">
    <label for="content">Content</label>
  </div>
  <textarea name="content" id="" cols="100" rows="10"></textarea>
<div>
<button type="submit" class="btn btn-primary" class=" float-right">Submit</button>
</div>

</form>

  </div>
</div>

@endsection
