@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                @if(isset($image_url))
                    <img src={{ asset("storage".$image_url) }} alt={{asset("storage".$image_url)}} class="card-img-top">
                @else
                    @if(auth()->user()->id == $id)
                        <div class="m-2">
                            <form action="/uploadImage" method="post" enctype="multipart/form-data">
                                @csrf
                                Upload Image:
                                <input class="m-1" type="file" name="image" id="image">
                                <input class="m-1" type="submit" value="Upload Image" name="submit">
                            </form>
                        </div>
                    @endif
                @endif
                <div class="card-header">
                    {{$user_data->name}}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$user_data->email}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection