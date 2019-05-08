@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Phone Notes</div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="text-right">
                            <a href="{{ route('phone-notes.create') }}" class="btn btn-dark">Download all Phone Notes</a>
                            <a href="{{ route('phone-notes.create') }}" class="btn btn-primary">+ New Phone Note</a>
                        </div>
                        <hr>

                        @if($phoneNotes)
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($phoneNotes as $phoneNote)
                                    <tr>
                                        <td><a href="{{ route('phone-notes.show', [ $phoneNote->id ]) }}">{{ $phoneNote->name }}</a></td>
                                        <td>{{ $phoneNote->phone_number }}</td>
                                        <td>{{ Str::limit($phoneNote->description, 45) }}</td>
                                        <td><a href="{{ route('phone-notes.edit', [ $phoneNote->id ]) }}">Edit</a></td>
                                        <td><a href="{{ route('phone-notes.destroy', [ $phoneNote->id ]) }}" class="text-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </table>

                        @else
                            There is no Phone Note
                        @endif
                    </div>
                    <div class="card-footer">
                        {{ $phoneNotes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
