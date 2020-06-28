@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group row">
                    <a href="{{ route('user.create') }}" >
                        <span>{{ __('Create') }}</span>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse ($users as $user)
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Name: {{$user->name}}</div>
                                    <div class="card-title">Surname: {{$user->surname}}</div>
                                    <div class="card-title">Email: {{$user->email}}</div>
                                    <div class="card-title">Role: {{$user->role_id}}</div>
                                    <div class="card-title">Rank: {{$user->rank_id}}</div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-6">
                                No users
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
