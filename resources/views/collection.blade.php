@extends('app')

@section('content')
    <p>Collection: </p>
    <ul>
        @forelse ($collection as $resource)
            <li>
                <a href="/admin/{{$resource::getCollectionName()}}/{{ $resource->id }}">{{ $resource->id }}</a>
            </li>
        @empty
            <p>No items</p>
        @endforelse
    </ul>
@endsection
