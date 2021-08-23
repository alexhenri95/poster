<main role="main">

    <section class="border border-y-0">
        
        <div>
            <div class="w-full bg-cover bg-no-repeat bg-center" style="height: 200px; background-image: url({{asset('img/fondo.jpg')}});">
            </div>
            <div class="p-4">
                <div class="relative flex items-center justify-between w-full">
                    <!-- Avatar -->
                    <div class="flex">
                        <div style="margin-top: -6rem;">
                            <div {{-- style="height:9rem; width:9rem;" --}} class="md rounded-full relative avatar">
                                @if($user->profile->image)
                                    <img class="rounded-full h-28 md:h-36 w-28 md:w-36" src="{{Storage::url($user->profile->image)}}"/>
                                @else
                                    <img class="rounded-full h-28 md:h-36 w-28 md:w-36" src="{{asset('img/user.svg')}}"/>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mx-1 md:mx-4 flex items-center">
                        @if($user->id == auth()->user()->id)

                            @livewire('user-edit', ['profile' => $user->profile], key($user->profile->id)) 

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                  class="bg-black text-white rounded-lg text-sm md:text-base py-1 md:py-2 px-2 md:px-3  hover:bg-gray-700 focus:outline-none transition"
                                >
                                  Cerrar sesión
                                </a>
                            </form>
                        @else
                            @livewire('follow-button', ['user' => $user], key($user->id))
                        @endif
                    </div>
                </div>

                

                <!-- Profile info -->
                <div class="space-y-1 justify-center w-full mt-3 ml-3">
                    <!-- User basic-->
                    <div>
                        <h2 class="text-xl leading-6 font-bold">{{$user->name}}</h2>
                        <p class="text-sm leading-5 font-medium text-gray-600">{{'@'.$user->nickname}}</p>
                    </div>
                    <!-- Description and others -->
                    <div class="mt-3">
                        <p class="leading-tight mb-2">{!!$user->profile->biography!!}</p>
                    </div>
                    <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-800 divide-solid">

                        <div class="text-center pr-3 cursor-pointer" wire:click="$set('open_seguidores',true)">
                            <span class="font-bold">{{$friends->where('receptor_id', $user->id)->count() - 1}}
                            </span>
                            <span class="text-gray-600"> Seguidores</span>
                        </div>

                        <div class="text-center px-3 cursor-pointer" wire:click="$set('open_seguidos',true)">
                            <span class="font-bold">{{$friends->where('user_id', $user->id)->count() - 1}}
                            </span>
                            <span class="text-gray-600"> Siguiendo</span>
                        </div>

                    </div>
                </div>
            </div>
            <hr class="border-gray-300 mb-6">
        </div>
        

        <div class="container-post-create mx-auto mb-8 ">
            @livewire('post-create')
        </div>

        <div class="container-profile mx-auto px-2">
            @livewire('user-post', ['user' => $user])            
        </div>
    </section>


    <x-jet-dialog-modal wire:model="open_seguidores" maxWidth="md">
        <x-slot name="title">
            <div class="font-bold text-sm text-center text-gray-800">
                Seguidores
            </div>
        </x-slot>

        <x-slot name="content">
            @foreach ($friends->where('receptor_id', $user->id) as $element)
              <ul class="mb-1">
                @foreach ($users->where('id', $element->user_id)->except(auth()->user()->id) as $item)
                  <li class="flex items-center px-2">

                      @if($item->profile->image)
                        <img src="{{Storage::url($item->profile->image)}}" class="rounded-full border-2 object-center object-cover border-white mr-2 h-12 w-12" alt="">
                      @else
                        <img src="{{asset('img/user.svg')}}" class="rounded-full border-2 object-center object-cover border-white mr-2 h-12 w-12">
                      @endif
                      <div>
                        <a href="{{ route('profile.show', $item) }}" class="hover:underline">{{$item->name}}</a>
                        <p class="text-sm text-gray-400">{{$item->nickname}}</p>
                      </div>

                  </li>
                @endforeach
              </ul>
            @endforeach
        </x-slot>

        <x-slot name="footer">
            
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_seguidos" maxWidth="md">
        <x-slot name="title">
            <div class="font-bold text-sm text-center text-gray-800">
                Seguidos
            </div>
        </x-slot>

        <x-slot name="content">
            @foreach ($friends->where('user_id', $user->id) as $element)
              <ul class="mb-1">
                @foreach ($users->where('id', $element->receptor_id)->except(auth()->user()->id) as $item)
                  <li class="flex items-center px-2">
                    
                      
                      @if($item->profile->image)
                        <img src="{{Storage::url($item->profile->image)}}" class="rounded-full border-2 object-center object-cover border-white mr-2 h-12 w-12" alt="">
                      @else
                        <img src="{{asset('img/user.svg')}}" class="rounded-full border-2 object-center object-cover border-white mr-2 h-12 w-12">
                      @endif
                      <div>
                        <a href="{{ route('profile.show', $item) }}" class="hover:underline">{{$item->name}}</a>
                        <p class="text-sm text-gray-400">{{$item->nickname}}</p>
                      </div>
                    
                  </li>
                  <div class="border-b mt-2 mb-2 border-b-300"></div>
                @endforeach
              </ul>
              @endforeach
        </x-slot>

        <x-slot name="footer">
            
        </x-slot>
    </x-jet-dialog-modal>

</main>

