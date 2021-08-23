<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">

        <style>
            .container {
                max-width: 935px;
            }
            .container-profile{
                max-width: 550px;
            }
            .container-post-create{
                max-width: 570px;
            }
        </style>


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </head>
    <body class="bg-gray-50" id="body-post">
        <x-jet-banner />

            @livewire('navigation')

            <!-- Page Content -->
            <main class="h-full">
                {{ $slot }}
            </main>
        
        @stack('modals')

        @livewireScripts
        
        @isset($js)
            {{$js}}
        @endisset

        <script>
        window.addEventListener('alert', event => { 
                     toastr[event.detail.type](event.detail.message, 
                     event.detail.title ?? ''), toastr.options = {
                            "positionClass": "toast-bottom-left",
                            "closeButton": true,
                            "progressBar": true,

                        }
                    });
        </script>
    </body>
</html>
