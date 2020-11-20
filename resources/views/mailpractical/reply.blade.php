@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menuitem')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Reply') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('compose.update') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label text-md-right"></label>
                        <div class="col-md-10">
                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $reply->sender_id }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label text-md-right">{{ __('Subject') }}</label>
                        <div class="col-md-10">
                            <input id="subject" type="text" class="form-control" name="subject" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label text-md-right">{{ __('Message') }}</label>
                        <div class="col-md-10">
                            <textarea id="message" class="form-control" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-right">
                            <input id="message" type="submit" class="btn btn-primary" value="submit" required>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
