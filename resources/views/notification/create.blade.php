@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new notification</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('notification.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="content" class="form-control" name="content" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('For') }}</label>

                                    <div class="col-md-6">
                                        <select name="rank_id" id="rank" class="form-control">
                                            @foreach ($ranks as $rank)
                                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
