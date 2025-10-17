@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ $student->name }}</h2>
    <h3>Your Attendance</h3>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
