@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group row">
                    <a href="{{ route('ship.create') }}" >
                        <span>{{ __('Create') }}</span>
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">Ships</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse ($ships as $ship)
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Serial: {{$ship->serial_number}}</div>
                                    <div class="card-subtitle">Name: {{$ship->name}}</div>
                                    <div class="card-img"><img title="{{$ship->name}}" src="{{asset('/images/' . $ship->image)}}" width="200" /></div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-6">
                                No ships
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
