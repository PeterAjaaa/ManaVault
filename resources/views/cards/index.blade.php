@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <form action="/cards/search" class="mb-4">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="card_name" class="form-control" placeholder="Enter card name" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($cards != null)
                    <div class="row">
                        @foreach ($cards as $card)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ $card->image_url_front ?? 'https://placehold.co/300x420?text=Image+not+found' }}"
                                            class="card-img-top" alt="{{ $card->name }}">
                                        @if ($card->image_url_back)
                                            <img src="{{ $card->image_url_back }}" class="card-img-top mt-3"
                                                alt="{{ $card->name }} (Back)">
                                        @endif
                                        <h5 class="card-title mt-3">{{ $card->name }}</h5>
                                        <p class="text-muted">Set: {{ $card->set }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">No cards found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
