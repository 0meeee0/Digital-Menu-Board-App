@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Operator Dashboard</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Add Restaurant Form --}}
                        <form method="post" action="{{ route('operator.restaurant.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Restaurant Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Restaurant Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="openingHour" class="form-label">Opening Hour:</label>
                                <input type="time" class="form-control" id="openingHour" name="openingHour" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Restaurant</button>
                        </form>

                        <hr>

                        {{-- List of Restaurants --}}
                        <h2>Your Restaurants</h2>
                        <ul class="list-group">
                            @forelse($restaurants as $restaurant)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $restaurant->name }} - {{ $restaurant->address }}
                                    <form method="post" action="{{ route('operator.restaurant.destroy', $restaurant->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item">No restaurants added yet.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
