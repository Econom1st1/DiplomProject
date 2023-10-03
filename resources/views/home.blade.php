@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ви увійшли в систему!') }}

                    @role('admin')
                        <script>window.location = "/adminpanel";</script>
                        @endrole
                    @role('user')
                            <script>window.location = "/user";</script>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
