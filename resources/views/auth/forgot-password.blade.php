<x-guest-layout>

    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-3xl text-center font-thin">¿Olvidaste tu contraseña?</h1>
                    <div class="p-2 text-sm text-justify mt-2">
                        {{ __('¿Olvidaste tu contraseña? Note preocupes. Escribe tu email y te enviaremos un email para resetear tu contraseña y poder cambiarla por una nueva.') }}
                    </div>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="w-full mt-2">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST"  action="{{ route('password.email') }}">
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
                                <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Recuperar contraseña
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg" style="background-image: url({{asset('img/login.jpg')}}); background-size: cover; background-position: center right;">
            </div>
        </div>
    </div>
</x-guest-layout>
