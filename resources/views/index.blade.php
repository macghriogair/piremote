@extends('layouts.master')
@section('content')
<h3>Raspi Remote</h3>
    @foreach ($plugs as $plug)
        <form action="/plug/{{$plug->id}}" method="POST" class="form-inline">
            <input type="hidden" name="uuid" value="{{$plug->getKey()}}"/>

            <div class="form-group col-md-8">
                <label class="col-md-8">{{$plug->name}}</label>
                <select name="status" class="form-control col-md-4">
                    <option value="1" {{ $plug->status == 1 ? "selected" : ""}}>On</option>
                    <option value="0" {{ $plug->status == 0 ? "selected" : ""}}>Off</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary col-md-2">Submit</button>
        </form>
        <br/><br/>
    @endforeach
@endsection

