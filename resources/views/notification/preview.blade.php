@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group row">
                    <a href="{{ route('notification.create') }}" >
                        <span>{{ __('Send notification') }}</span>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse ($notifications as $notification)
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Author: {{$notification->author_id}}</div>
                                    <div class="card-title">Content: {{$notification->content}}</div>
                                    <div class="card-title">Rank: {{$notification->rank_id}}</div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-6">
                                No notifications
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
