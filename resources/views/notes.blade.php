@extends('layouts.app')

@section('content')

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>My notes</h1>

                    @foreach ($notes as $note)
                        <p>
                            {{ $note->note }}
                        </p>
                    @endforeach


                <form method="POST" , action="/notes">
                    @csrf
                    <textarea type="text" name="note"></textarea>
                    <input type="submit" value="Create">

                </form>
            </div>




        </div>




    </div>


@endsection