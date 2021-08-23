<div class="py-6 h-full">

    <div class="max-w-xl mx-auto">


                <div class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-800 p-4 rounded-xl border mb-4">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            @if($post->user->profile->image)
                                <img class="h-10 w-10 rounded-full" src="{{Storage::url($post->user->profile->image)}}"/>

                            @else
                                <img class="h-10 w-10 rounded-full" src="{{asset('img/user.svg')}}"/>
                            @endif
                            <div class="ml-3 text-sm leading-tight">
                                <span class="text-black dark:text-white font-bold block ">{{$post->user->name}}</span>
                                <span class="text-gray-500 dark:text-gray-400 font-normal block">{{'@'.$post->user->nickname}}</span>
                            </div>
                        </div>
                        <div>
                            @if($post->user_id == auth()->user()->id)
                            <x-jet-dropdown width="48">
                                    <x-slot name="trigger">
                                        <span class="relative inline-block cursor-pointer">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="py-1 px-4 text-center">
                                            
                                            <div x-data="{open:false}">
                                                <a class="flex items-center cursor-pointer text-sm" x-on:click="open=true">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    <span class="mt-1">Eliminar publicación</span>
                                                </a>

                                                <div class="mt-2 rounded" x-show="open">

                                                    <div class="flex justify-end justify-between mx-2">
                                                        <button class="px-1 py-1 rounded text-xs inline-flex items-center bg-white border border-gray-300 rounded-md font-semibold text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" x-on:click="open=false">Cancelar</button>

                                                        <button class="px-1 py-1 rounded text-xs inline-flex items-center bg-white border border-gray-300 rounded-md font-semibold text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="deleteId({{$post->id}})">Eliminar</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </x-slot>
                            </x-jet-dropdown> 
                            @endif
                        </div>
                    </div>
                    <p class="text-black dark:text-white block text-lg leading-snug my-3">{{$post->body}}</p>
                    @if($post->image)
                        <img class="rounded-xl border border-gray-100 dark:border-gray-700" src="{{Storage::url($post->image)}}" />
                    @endif
                    <p class="text-gray-500 dark:text-gray-400 text-xs my-0.5">{{$post->created_at}}</p>

                    <div class="border-b border-gray-200 my-1"></div>
                    
                    @livewire('comment-heart', ['post'=>$post], key($post->id))               
                </div>

    </div>

</div>
