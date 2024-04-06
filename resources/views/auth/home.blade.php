@extends('nav.header')

@section('content')
<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td> <img src="data:image;base64,{{ base64_encode($user->image) }}" alt="image" style="max-width: 100px; max-height: 100px;" /></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
              
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection