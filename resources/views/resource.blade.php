@extends('app')

@section('content')
    <p>resource: </p>
    <pre>
        {{$resource}}
    </pre>
    <form action="/api/{{$type}}" method="POST">
        @foreach ($resource->structure as $field)
            <div>
                <label for="{{$field}}">{{$field}}</label>
                <input type="text" id="{{$field}}" name="{{$field}}" />
            </div>
        @endforeach
        <button type="submit">GO</button>
    </form>
@endsection
