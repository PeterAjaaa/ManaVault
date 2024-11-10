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
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection