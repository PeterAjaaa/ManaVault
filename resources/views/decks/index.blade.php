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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Deck Name</th>
                                <th scope="col" class="text-center">Deck Description</th>
                                <th scope="col" class="text-center">Deck Format</th>
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
                                    <td class="text-center">
                                        <a href="{{ route('decks.show', $deck->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('decks.edit', $deck->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('decks.destroy', $deck->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this deck?');">
                                                Delete Deck
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('sideboards.index', $deck->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('sideboards.edit', $deck->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('sideboards.destroy', $deck->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete ALL sideboards for this deck?');">
                                                Delete Sideboards
                                            </button>
                                        </form>
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
