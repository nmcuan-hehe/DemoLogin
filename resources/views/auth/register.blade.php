@extends('nav.header')

@section('content')
<div class="container">
    <form action="{{ route('user.createUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <div class="mb-3 mt-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
            </div>
            <div class="form-group">
                Select image to upload:
                <input type="file" name="image" id="image">
                <!-- <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewImage(this);"> -->
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection