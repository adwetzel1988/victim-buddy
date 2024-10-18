@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if(isset($query))
        <p>You searched for: {{ $query }}</p>
    @endif
    <p>Number of founded and completed cases: {{ $results->count() }}</p>
    @if($results->count() > 0)
        <div class="row">
            @foreach($results as $complaint)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Case #{{ $complaint->complaint_number }}</h5>
                            <p class="card-text">Court Name: {{ $complaint->court_name }}</p>
                            <p class="card-text">Description: {{ $complaint->description }}</p>
                            <p class="card-text">Status: Completed</p>
                            <p class="card-text">Defendant: {{ $complaint->user->name }}</p>
                            <p class="card-text">Action Taken: {{ $complaint->action_taken }}</p>
                            <p class="card-text">Date: {{ $complaint->created_at->format('m/d/Y') }}</p>
                            @if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'subadmin'))
                                <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="btn btn-primary">View Details</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No founded and completed complaints found.</p>
    @endif
    <a href="{{ route('complaints.search') }}" class="btn btn-primary">New Search</a>
</div>
@endsection
