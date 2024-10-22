@extends('layouts.app')

@section('title', 'VictimBuddy')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(auth()->check())
                <div class="text-center mb-5"> <!-- Added mb-5 for more bottom margin -->
                    <a href="{{ route('complaints.create') }}" class="btn btn-danger btn-lg">Create a Case</a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
