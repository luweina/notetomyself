@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>To Be Done</h1>
                <ul>
                    @foreach ($todos as $todo)
                        <li>
                            {{ $todo->todo }}
                        </li>
                    @endforeach
                </ul>

                <form method="POST" , action="/tbd">
                    @csrf
                    <input type="text" name="todo">
                    <input type="submit" value="Create">

                </form>
            </div>

            <div class="col-sm">
                <h1>bookmark url</h1>
                <ul>
                    @foreach ($bookmarks as $bookmark)
                        <li>
                            <a href="{{ $bookmark->bookmark }}">{{ $bookmark->bookmark }}</a>
                           
                        </li>
                    @endforeach
                </ul>
                <form method="POST" , action="/bookmark">
                    @csrf
                    <input type="text" name="bookmark">
                    <input type="submit" value="Create">

                </form>
            </div>


        </div>




    </div>


@endsection
