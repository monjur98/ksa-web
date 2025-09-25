@extends('admin.layout.authmain')
@section('content')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <div class="pb-2 text-center">
                                <img src="{{ asset('assets/admin/img/logo.png') }}" height="80"
                                    alt="Kolkata Steel Associates">
                                <h5 class="card-title pt-4">Kolkata Steel Associates</h5>
                                <p class="small mb-0">Register by filling out the form.</p>
                            </div>
                            <form class="row" action="{{ route('registration_process') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <label for="" class="form-label small mb-0">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start-pill border-end-0"><i
                                                class="bi bi-person"></i></span>
                                        <input type="text" name="name"
                                            class="form-control rounded-end-pill border-start-0" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger small">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label small mb-0">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start-pill border-end-0"><i
                                                class="bi bi-envelope-at"></i></span>
                                        <input type="mail" name="email"
                                            class="form-control rounded-end-pill border-start-0" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger small">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label small mb-0">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control  rounded-start-pill border-end-0 password-input" required>
                                        <span class="input-group-text rounded-end-pill border-start-0 toggle-password"><i
                                                class="bi bi-eye"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger small">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label small mb-0">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation"
                                            class="form-control  rounded-start-pill border-end-0 password-input" required>
                                        <span class="input-group-text rounded-end-pill border-start-0 toggle-password"><i
                                                class="bi bi-eye"></i></span>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger small">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button class="btn btn-primary px-4 rounded-pill" type="submit">Register <i
                                            class="bi bi-person-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
