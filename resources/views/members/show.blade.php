@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($members) > 0)
                <ul class="list-group list-group-flush" style="width: 20rem">
                @foreach ($members as $member)
                    <li class="list-group-item"><a class="btn btn-primary" href="{{ url('/profile', $member->id) }}">{{$member->name}}</a></li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection