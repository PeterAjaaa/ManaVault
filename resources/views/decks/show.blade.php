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
                <h1>Deck Name: {{ $decks->name }}</h1>
                <h2>Description: {{ $decks->description }}</h2>
                <h3>Created by: {{ $decks->user->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($decks->deckCards->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Card Name</th>
                                <th scope="col">Card Quantity</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decks->deckCards as $deckCard)
                                <tr>
                                    <td>{{ $deckCard->cards->name }}</td>
                                    <td>{{ $deckCard->quantity }}</td>
                                    <td><img src="{{ $deckCard->cards->image_url_front ?? 'https://placehold.co/300x420?text=Image+not+found' }}"
                                            class="w-25 h-25 rounded-4">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No cards found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
