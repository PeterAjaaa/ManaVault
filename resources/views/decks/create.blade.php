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
                <form action={{ route('decks.store') }} method="POST">
                    <input type="hidden" name="created_by_user_id" value="{{ $user_id }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Deck Name</label>
                        <input type="text" class="form-control mb-3" id="name" name="name"
                            placeholder="Deck Name" value="{{ old('name') }}" required>

                        <label for="description">Description</label>
                        <input type="text" class="form-control mb-3" id="description" name="description"
                            placeholder="Description" value="{{ old('description') }}">

                        <label for="format">Format</label>
                        <select class="form-control mb-3" id="format" name="format">
                            <option value="Standard">Standard</option>
                            <option value="Modern">Modern</option>
                            <option value="Legacy">Legacy</option>
                            <option value="Pauper">Pauper</option>
                            <option value="Pioneer">Pioneer</option>
                            <option value="Vintage">Vintage</option>
                            <option value="Commander">Commander</option>
                        </select>
                        <label for="decklist">Import Decklist</label>
                        <textarea id="decklist" name="decklist" rows="10" class="form-control mb-3"
                            placeholder="Paste your decklist here..." value="{{ old('decklist') }}" required></textarea>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
