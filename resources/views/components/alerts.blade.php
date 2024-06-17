@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismissible="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismissible="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismissible="alert" aria-label="Close"></button>
    </div>
@endif
