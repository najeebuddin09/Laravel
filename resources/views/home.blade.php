@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <form action="/submitPost" method="POST">
                @csrf
                    <div class="card-header">
                        <input type="text" class="form-control" name="title" id="title" value="Title">        
                    </div>
                    <div class="card-body">
                        <textarea type="textarea" class="mb-2 form-control" name="body" rows="3" id="body">Body</textarea>
                        <input class="btn btn-info" type="submit" value="Submit Post">
                    </div>
                </form>
            </div>
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="card mb-2">
                        <div class="card-header">
                            <h5 class="font-weight-bold">{{$post->title}}</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at}}</h6>
                            <p class="font-weight-normal text-justify">{{$post->body}}</p>
                        <h6 class="card-subtitle mt-2 text-muted">By <a class="btn btn-light ml-1" href="{{ url('/profile', $post->uid) }}">{{$post->user_name}}</a></h6>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            @endif
        </div>
    </div>
</div>
@endsection
