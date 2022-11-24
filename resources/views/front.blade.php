@include('layouts.app')

<div class="container">
    <div class="row gap-3">
            @foreach ($front as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('/') }}storage/{{ $item->foto }}" class="card-img-top mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ $item->isi }} ...</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
    </div>
</div>

@include('layouts.footer')
