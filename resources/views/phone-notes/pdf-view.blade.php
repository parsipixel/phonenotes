<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #EEE;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{--<div class="card-header">Phone Notes</div>--}}
                <div class="card-body">
                    <h1 class="text-center">My Phone Notes</h1>
                    <div class="container p-4">

                        <table class="table table-striped">
                            <thead>
                            <tr class="table-primary">
                                <th width="25%">Name</th>
                                <th width="25%">Phone Number</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phoneNotes as $phoneNote)
                                <tr>
                                    <td>{{ $phoneNote->name }}</td>
                                    <td>{{ $phoneNote->phone_number }}</td>
                                    <td>{!! nl2br(e($phoneNote->description)) !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
{{--@endsection--}}

