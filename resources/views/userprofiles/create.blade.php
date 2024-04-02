@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   





 <h1>Create New User Profile</h1>
        <form action="{{ route('userprofiles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <!-- Add other form fields as needed -->
            <button type="submit" class="btn btn-primary">Create Profile</button>
        </form>














                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection