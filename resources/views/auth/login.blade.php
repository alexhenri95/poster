<x-guest-layout>
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-3xl text-center font-thin">Bienvenido</h1>
                    {{-- <x-jet-validation-errors class="mt-2" /> --}}
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex flex-col mt-4">
                                <input type="email" name="email" id="email" class="flex-grow h-8 px-2 border rounded border-grey-400" value="{{old('email')}}" placeholder="Email" required autofocus>
                                
                                @error('email')
                                    <div class="text-xs text-blue-600 mt-1">
                                        <span>(*){{$message}}</span>
                                    </div>
                                @enderror
                                
                            </div>

                            <div class="flex flex-col mt-4">
                                <input type="password" name="password" id="password" class="flex-grow h-8 px-2 rounded border border-grey-400" autocomplete="current-password" required placeholder="Contraseña">

                                @error('password')
                                    <div class="text-xs text-blue-600 mt-1">
                                        <span>(*){{$message}}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex items-center mt-4">
                                <input type="checkbox" name="remember" id="remember" class="mr-2"> 
                                <label for="remember" class="text-sm text-grey-dark">Recuérdame</label>
                            </div>

                            <div class="flex flex-col mt-8">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Login
                                </button>
                            </div>
            
                            <div class="text-center mt-4">
                                @if (Route::has('password.request'))   
                                    <a class="no-underline hover:underline text-blue-dark text-xs" href="{{ route('password.request') }}">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </form>

                        <div class="mt-2">
                            <div class="flex justify-center items-center text-xs">
                                <label class="mr-2" >¿Eres nuevo?</label>
                                <a href="{{ route('register') }}" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Crea una cuenta
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background-image: url({{asset('img/login.jpg')}}); background-size: cover; background-position: center right;">
            </div>
        </div>
    </div>
</x-guest-layout>
