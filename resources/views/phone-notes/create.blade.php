@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Phone Notes</div>
                    <div class="card-body">
                        @include('phone-notes.partials.errors')
                        @include('phone-notes.partials.form', [
                            'action' => route('phone-notes.store'),
                            'method' => 'post'
                        ])
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
