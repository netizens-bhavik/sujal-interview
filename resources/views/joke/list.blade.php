@extends('layouts.master')

@section('content')

<div class="table-responsive">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Joke</th>
                <th scope="col">Rating</th>
                <th scope="col">Total Reviews</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jokes as $key => $j)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$j->joke}}</td>
                <td>{{number_format($j->ratings_avg_rating)}}</td>
                <td>{{$j->ratings_count}}</td>
                <td>
                    <a href="{{ route('joke.detail',$j->id) }}" class="btn btn-primary btn-sm">Rate This</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No records</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection