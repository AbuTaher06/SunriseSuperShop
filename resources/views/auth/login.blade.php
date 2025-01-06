<!-- resources/views/auth/login.blade.php -->
<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow">Home</a>
                    <span></span> Login
                </div>
            </div>
        </div>
        <section class="pt-20 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('assets/imgs/login.png') }}" alt="Login Image">
                            </div>
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" required name="email" placeholder="Your Email" value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                                            </div>
                                        </form>
                                        <div class="text-muted text-center">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
