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
