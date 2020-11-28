@extends('layouts.app')
@section('title','View All Users')
@section('content')
<div class="row mt-2">
    <div class="col-12 col-md-8">
        <h2>All Registered Users</h2>
        <h4>Total Count: {{ $users->total() }}</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h4 class="d-block d-lg-none">Move right & left to see all details.</h4>
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle">Edit</th>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle">Mobile No.</th>
                        <th class="align-middle">Role</th>
                        <th class="align-middle">Created at</th>
                        <th class="align-middle">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('users.edit',['user' => $user]) }}">Edit</a>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_number }}</td>
                        <td>{{ $user->role_name }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $users->links() !!}
    </div>
</div>
@endsection
