@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="/decks/new" class="btn btn-primary">Create new deck</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($decks != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Deck Name</th>
                                <th scope="col">Created By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decks as $deck)
                                <tr>
                                    <td><a href="/decks/{{ $deck->deck_id }}">{{ $deck->deck_name }}</a></td>
                                    <td>{{ $deck->created_by_user_id }}</td>
                                </tr>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No decks found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
