<div>
    <span wire:click="$set('open_comment',true)">Comentarios</span>

    <x-jet-dialog-modal wire:model="open_comment" maxWidth="lg">
        <x-slot name="title">
            <div class="font-bold text-sm text-center text-gray-800">
                Comentarios
            </div>
        </x-slot>

        <x-slot name="content">
            
            <p class="text-black dark:text-white block text-base leading-snug">
                {{$post->body}}
            </p>

            @if($post->body)
                <div class="mb-1">
                    <img class="h-56 w-60 mx-auto mt-2 rounded-xl border border-gray-100 dark:border-gray-700" src="{{Storage::url($post->image)}}" />

                    {{-- <img class="h-60 w-60 mx-auto mt-2 rounded-2xl border border-gray-100 dark:border-gray-700" src="https://static8.depositphotos.com/1160465/822/i/600/depositphotos_8228852-stock-photo-full-color-old-wood-room.jpg" /> --}}
                </div>
            @endif
                
            @if($post->comments->count() > 0)
            <div class="scroll-bg py-2 text-sm rounded">

                <ul class="text-sm scroll-div">
                    @foreach($post->comments as $comment)

                        <div class="flex items-center space-x-2 px-2 mb-2">
                            <div class="flex flex-shrink-0 self-start cursor-pointer">
                                @if ($comment->user->profile->image)
                                    <img src="{{Storage::url($comment->user->profile->image)}}" alt="" class="h-8 w-8 object-fill rounded-full">
                                @else
                                    <img src="{{asset('img/user.svg')}}" alt="" class="h-8 w-8 object-fill rounded-full">
                                @endif
                                
                            </div>

                            <div class="flex items-center justify-start space-x-2 w-full">
                              <div class="block">
                                <div class="bg-gray-100 w-auto rounded-xl px-2 py-1">
                                  <div class="font-medium">
                                    <a href="{{route('profile.show', $comment->user->profile->id)}}" class="hover:underline font-semibold">
                                      {{$comment->user->nickname}}
                                    </a>
                                  </div>
                                  <div class="">
                                    {{$comment->body}}
                                  </div>
                                </div>
                                <div class="flex justify-start items-center w-full">
                                  <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                      <small>{{$comment->created_at->diffForHumans()}}</small>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            
                            <div class="self-start ml-auto mt-1">
                                @if($comment->user->id == auth()->user()->id)
                                <x-jet-dropdown width="48">
                                    <x-slot name="trigger">
                                        <span class="relative inline-block cursor-pointer">
                                            <svg class="w-3 h-3 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>

                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="py-1 px-4 text-center">
                                            
                                            <div x-data="{open:false}">
                                            <div class="flex items-center justify-between cursor-pointer text-sm" x-on:click="open=true">
                                                <span class="mt-1">Eliminar</span>
                                                <div>
                                                    <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full hover:bg-red-500" x-on:click="open=false">No</a>

                                                    <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-100 bg-blue-600 rounded-full hover:bg-blue-500" wire:click="deleteId({{$comment->id}})">Si</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                                @endif
                            </div>

                        </div>

                    @endforeach
                </ul>
            </div>
            @endif

            <div class="wrapper flex items-center mt-2">

                <input  wire:model.defer="body" class="border-b outline-none focus:outline-none border-gray-200  text-gray-600 font-medium text-base w-full px-2 py-1 flex-1" placeholder="¿Qué opinas?"></input>

                <div class="ml-2">
                    <button wire:click="saveComentario"  class="px-2 py-1 bg-blue-500 text-white rounded">Comentar</button>
                </div>

            </div>
            
        </x-slot>

        <x-slot name="footer">
            <div class="likes flex items-center justify-center">
                @if($heart->where('user_id', auth()->user()->id)->count() )
                    <div wire:click="deleteHeart('{{auth()->user()->id}}','{{$post->id}}')" class="cursor-pointer">
                        <svg class="w-5 h-5 text-red-600" fill="red" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                @else
                    <div wire:click="saveHeart" class="cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                @endif
                

                <span class="ml-1 mt-1 text-sm">
                    {{$heart->count()}} Me gusta
                </span>
            </div>
        </x-slot>
    </x-jet-dialog-modal> 
</div>
