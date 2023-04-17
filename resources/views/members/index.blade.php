@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Members</h1>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>School</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->school_name }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
