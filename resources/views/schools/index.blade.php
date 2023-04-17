@extends('layouts.app')

@section('content')
    <h1>All Schools</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
        </thead>
        <tbody>
        @foreach ($schools as $school)
            <tr>
                <td><li><a href="{{ route('schools.show', $school->id) }}">{{ $school->name }}</a></li></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

