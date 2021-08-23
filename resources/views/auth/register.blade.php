<x-guest-layout>
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center my-4">
                    <h1 class="text-3xl text-center font-thin">Registrarse</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('register') }}">
                        @csrf

                            <div class="flex flex-col mt-4">
                                <input id="name" type="text" name="name" value="{{old('name')}}" class="flex-grow h-8 px-2 border rounded border-grey-400" required autofocus autocomplete="name" placeholder="Nombre completo">
                                @error('name')
                                    <div class="text-xs text-blue-600 mt-1">
                                        <span>(*){{$message}}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-4">
                                <input id="nickname" type="text" name="nickname" value="{{old('nickname')}}" class="flex-grow h-8 px-2 border rounded border-grey-400" required autofocus autocomplete="nickname" placeholder="Nombre de usuario">
                                @error('nickname')
                                    <div class="text-xs text-blue-600 mt-1">
                                        <span>(*){{$message}}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-4">
                                <input id="email" type="email" name="email" value="{{old('email')}}" class="flex-grow h-8 px-2 border rounded border-grey-400" required autofocus autocomplete="email" placeholder="Email">
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
                                        <span>(*) La contraseña debe tener al menos 8 caracteres.</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex items-center mt-4">
                                <input type="checkbox" name="remember" id="remember" class="mr-2"> 
                                <label for="remember" class="text-sm text-grey-dark">Recuérdame</label>
                            </div>

                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                    Registrarse
                                </button>
                            </div>
                        </form>

                         <div class="mt-2">
                            <div class="flex justify-center items-center text-xs">
                                <label class="mr-2" >¿Ya tienes una cuenta?</label>
                                <a href="{{ route('login') }}" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Inicia sesión
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
