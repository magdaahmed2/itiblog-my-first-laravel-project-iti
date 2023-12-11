@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @can('is-admin')
                 <p class="text-danger">hello admin</p>
                 @elsecan('is-manager')
                 <p class="text-danger">hello manager</p>
                  @elsecan('is-author')
                 <p class="text-danger">hello author</p>
                @endcan
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
