@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Schools</h1>
        <a href="{{ route('schools.create') }}" class="btn btn-primary">Add School</a>
        <br><br>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->email }}</td>
                    <td>
                        <a href="{{ route('schools.show', $school->id) }}" class="btn btn-info">View</a>
                      {{--  <button type="submit" class="btn btn-danger">Delete</button>--}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
