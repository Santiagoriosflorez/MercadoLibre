<x-app title="Inicio de sesion">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card content">
                    <div>
                        <img class="img" src="{{ Vite::asset('resources/images/Avatar.png') }}" alt="Oval Image">
                    </div>
                    <div class="title"><strong>!Bienvenido</strong></div>

                    <div class="card-body body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-2 justify-content-center">
                                <div class="col-md-7 input-container">
                                    <i class="fa-solid fa-envelope email" style="color: #000000;"></i>
                                    <input id="email" type="email"
                                        class="form-control-login @error('email') is-invalid @enderror " name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="hola@sitioincreible.com">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 justify-content-center">

                                <div class="col-md-7 input-container">
                                    <i class="fa-solid fa-key key" style="color: #000000;"></i>
                                    <input id="password" type="password"
                                        class="form-control-login @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar Sesion
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
