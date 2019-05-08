@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Phone Note Detail</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-right">
                                <strong>Name: </strong>
                            </div>
                            <div class="col-sm-6">
                                {{ $phoneNote->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-right">
                                <strong>Phone Number: </strong>
                            </div>
                            <div class="col-sm-6">
                                {{ $phoneNote->phone_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-right">
                                <strong>Description: </strong>
                            </div>
                            <div class="col-sm-6">
                                {!! nl2br(e($phoneNote->description)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
