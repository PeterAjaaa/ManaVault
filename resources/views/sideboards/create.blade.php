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
            <div class="col-12">
                <form action="{{ route('sideboards.store', $decks) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="decklist">Import Decklist</label>
                        <textarea id="decklist" name="decklist" rows="10" class="form-control mb-3"
                            placeholder="Paste your decklist here..." value="{{ old('decklist') }}" required></textarea>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
