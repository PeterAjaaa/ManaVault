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
                <form action={{ route('decks.update', $decks->id) }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Deck Name</label>
                        <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Deck Name"
                            value="{{ $decks->name }}" required>

                        <label for="description">Description</label>
                        <input type="text" class="form-control mb-3" id="description" name="description"
                            value="{{ $decks->description }}" placeholder="Description">

                        <label for="format">Format</label>
                        <select class="form-control mb-3" id="format" name="format">
                            <option value="Standard">Standard</option>
                            <option value="Modern">Modern</option>
                            <option value="Legacy">Legacy</option>
                            <option value="Pauper">Pauper</option>
                            <option value="Pioneer">Pioneer</option>
                            <option value="Vintage">Vintage</option>
                        </select>
                        <textarea id="decklist" name="decklist" rows="10" class="form-control mb-3"
                            placeholder="Paste your decklist here..." required>
@foreach ($decks->deckCards as $deckCard)
{{ $deckCard->quantity }}x {{ $deckCard->cards->name }}
@endforeach
</textarea>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
