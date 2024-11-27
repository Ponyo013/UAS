@extends('layouts.admin')

@section('content')
    <h1>Manage Newsletters</h1>
    <a>Add New Newsletter</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $newsletter)
                <tr>
                    <td>{{ $newsletter->title }}</td>
                    <td>{{ $newsletter->publish_date }}</td>
                    <td>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
