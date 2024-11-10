@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/decks" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="deck_name">Deck Name</label>
                        <input type="text" class="form-control mb-3" id="deck_name" name="deck_name" placeholder="Deck Name"
                            required>

                        <label for="description">Description</label>
                        <input type="text" class="form-control mb-3" id="description" name="description"
                            placeholder="Description">

                        <label for="format">Format</label>
                        <select class="form-control mb-3" id="format" name="format">
                            <option value="standard">Standard</option>
                            <option value="modern">Modern</option>
                            <option value="legacy">Legacy</option>
                            <option value="pauper">Pauper</option>
                            <option value="pioneer">Pioneer</option>
                            <option value="vintage">Vintage</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
