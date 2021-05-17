@extends('layouts.app')

@section('content')
<div>
    <form action="/item" method="POST">
    @csrf
    <label for="">item name</label>
    <input type="text" name="item_name" id="">
    <label for="">item type</label>
    <select  id="item_type" class="item_type" name="item_type">
    <option value="ff">ff</option>
    <option value="kk">kk</option>
    <option value="rr">frr</option>
    <option value="s">ft</option>
    </select>
    <label for="">item weight</label>
    <input type="text" name="item_weight" id="">
    <label for="">item brand</label>
    <input type="text" name="item_brand" id="">
    <input type="checkbox" name="supplier" id="" value="tee">tee<br>
    <input type="checkbox" name="supplier" id="" value="tee">teej<br>
    <input type="checkbox" name="supplier" id="" value="tee">teehdh<br>


    <input type="submit" name="submit" id="">
    </form>
</div>

@endsection
