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
            <div class="col-12 d-flex justify-content-end mb-3">
                <a href="/decks/new" class="btn btn-primary">Create new deck</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($decks != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Deck Name</th>
                                <th scope="col" class="text-center">Deck Description</th>
                                <th scope="col" class="text-center">Deck Format</th>
                                <th scope="col" class="text-center">Created By</th>
                                <th scope="col" class="text-center">Actions</th>
                                <th scope="col" class="text-center">Sideboard</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decks as $deck)
                                <tr>
                                    <td class="text-center">{{ $deck->name }}</td>
                                    <td class="text-center">{{ $deck->description }}</td>
                                    <td class="text-center">{{ $deck->format }}</td>
                                    <td class="text-center">{{ $deck->user->name }}</td>
                                    <td class="text-center">
                                        <a href="/decks/{{ $deck->id }}" class="btn btn-info">View</a>
                                        <a href="/decks/{{ $deck->id }}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/decks/{{ $deck->id }}/delete" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/decks/{{ $deck->id }}/sideboard" class="btn btn-info">View</a>
                                        <a href="/decks/{{ $deck->id }}/sideboard/edit" class="btn btn-warning">Edit</a>
                                        <a href="/decks/{{ $deck->id }}/sideboard/delete"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
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
