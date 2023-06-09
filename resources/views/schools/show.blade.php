@extends('layouts.app')

@section('content')
<h1>{{ $school->name }}</h1>

<h2>Members</h2>
<ul>
    @foreach ($school->members as $member)
        <li>{{ $member->name }} - {{ $member->email }}</li>
    @endforeach
</ul>
<a href="{{ route('schools.index') }}" class="btn btn-primary">Back</a>
@endsection

