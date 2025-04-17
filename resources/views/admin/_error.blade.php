@if ($error->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($error->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    