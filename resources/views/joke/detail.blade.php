@extends('layouts.master')

@section('content')

<form action="{{route('add.rating.to.joke',$joke->id)}}" method="post">
    @csrf
    @method('post')

    <div class="form-group">
        <label for="joke-detail">Joke</label>
        <div class="form-control" id="joke-detail">{{$joke->joke}}</div>
    </div>
    <div class="form-group">
        <label for="rating">Select Rating</label>
        <select name="rating" class="form-control" id="rating">
            <option value="">select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        @if($errors->has('rating'))
        <small class="form-text text-muted">{{ $errors->first('rating') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection