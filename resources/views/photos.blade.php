@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Upload images (Up to 4)</div>
            <div class="card-body">
                <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    @if (count($images) >= 4)
                    <p>maximum 4 image can be uploaded</p>

                    @else
                    <input type="submit" name="upload">
                    @endif
                </form>

            </div>


        </div>
    </div>
    <p>{{count($images)}}</p>
    @foreach ($images as $image)

        <a href="{{asset('/storage/images/'.$image->image)}}"><img src="{{asset('/storage/images/'.$image->image)}}" alt="" width="300px"></a>
        <form action="/delete/{{$image->id}}" method="POST">
            @csrf
            <input type="submit" name="delete" value="delete">
        </form>



@endforeach


</div>
@endsection