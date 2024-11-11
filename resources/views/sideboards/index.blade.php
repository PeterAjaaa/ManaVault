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
            <div class="col-6 d-flex justify-content-end mb-3">
                <a href={{ route('sideboards.create', $decks) }} class="btn btn-primary">Create new sideboard</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>{{ $decks->name }}'s Sideboard</h1>
                @if ($decks->sideboards->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Card Name</th>
                                <th scope="col">Card Quantity</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decks->sideboards as $sideboard)
                                <tr>
                                    <td>{{ $sideboard->cards->name }}</td>
                                    <td>{{ $sideboard->quantity }}</td>
                                    <td><img src="{{ $sideboard->cards->image_url_front ?? 'https://placehold.co/300x420?text=Image+not+found' }}"
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
