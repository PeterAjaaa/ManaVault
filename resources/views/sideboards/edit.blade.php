@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-6 d-flex justify-content-start mb-3">
                <a href={{ route('decks.index') }} class="btn btn-primary">Back to decks</a>
            </div>
            <div class="col-12">
                <form action={{ route('sideboards.update', $decks) }} method="POST">
                    @csrf
                    <textarea id="decklist" name="decklist" rows="10" class="form-control mb-3" placeholder="Paste your decklist here..."
                        required>
@foreach ($decks->sideboards as $sideboard)
{{ $sideboard->quantity }}x {{ $sideboard->cards->name }}
@endforeach
</textarea>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
