@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Phone Notes</div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ur>
                                    @foreach ($errors->all() as $message)
                                        <li>
                                            {{ $message }}
                                        </li>
                                    @endforeach
                                </ur>
                            </div>
                        @endif

                        <form method="post" action="{{ route('phone-notes.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control invalid {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
                                       placeholder="Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone-number">Phone Number</label>
                                <input type="text" class="form-control {{ $errors->has('phone-number') ? 'is-invalid' : '' }}" id="phone-number" name="phone-number"
                                       placeholder="Phone Number"
                                       value="{{ old('phone-number') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="number" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                                          name="description" placeholder="Description">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
