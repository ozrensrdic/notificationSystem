@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(auth()->user()->isAdmin())
                    <div class="form-group row">
                        <a href="{{ route('notification.create') }}" >
                            <span>{{ __('Send notification') }}</span>
                        </a>
                    </div>
                @endif
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
                                    <div class="card-title">Author: {{ $notification->data['author_id'] }}</div>
                                    <div class="card-title">Content: {{ $notification->data['content'] }}</div>

                                    @if($notification->read_at)
                                        <div class="card-title">Read: {{ $notification->read_at->format('d.m.Y') }}</div>
                                    @else
                                        <form method="POST" action="{{ route('notification.seen', ['notification' => $notification->id]) }}">
                                            @csrf
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Mark as seen') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
