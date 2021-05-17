@extends('layouts.app')

@section('content')
<div>
@foreach($items as $item)
{{$item->id}}-{{$item->name}}-{{$item->type}}-{{$item->brand}}-{{$item->weight}}
<br>
{{--<ul>
@foreach($item->suppliers as $supplier)
<li>
{{$supplier}}
</li>
@endforeach
</ul>
--}}
<br>
@endforeach
<p class="item_created">{{session('message')}}</p>
</div>


@endsection

