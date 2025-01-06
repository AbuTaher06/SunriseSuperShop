<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow">Home</a>
                    <span></span> Register
                </div>
            </div>
        </div>
        <section class="pt-20 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>
                                        <form method="post" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="register">Submit & Register</button>
                                            </div>
                                        </form>
                                        <div class="text-muted text-center">Already have an account? <a href="{{ route('login') }}">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <img src="assets/imgs/login.png" alt="Login">
                            </div>
                            <div class="col-lg-1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
