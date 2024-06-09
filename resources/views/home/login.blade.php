@extends('layout.home')
@section('page_title', 'Log In')
@section('page_content')
    @if ($errors->any())
        <div class="alert alert-info">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
            <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card" style="min-width: 300px">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Silahkan Log In</p>
                    <div class="alert alert-danger alert-dismissible" id="form_alert" style="display: none;">
                        <span id="form_alert_content"></span>
                    </div>
                    <form id="fm_login" action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Username"
                                autocomplete="off">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8"> </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
