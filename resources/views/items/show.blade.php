@extends('layouts.app')

@section('content')
<div>

{{$item->name}}
{{$item->type}}
{{$item->weight}}


<br>
<form action="/item/{{$item->id}}" method="post">
@csrf
@method('DELETE')
<label for="">Delete</label>
<button>Delete</button>
</form>

</div>


@endsection
