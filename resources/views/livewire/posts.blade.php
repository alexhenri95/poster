<div class="py-6 h-full">

    <div class="max-w-xl mx-auto">
        
        {{-- Crear post --}}
        @livewire('post-create')
        

        {{-- Listar posts --}}
        @foreach ($posts as $post)
            @foreach ($friends->where('receptor_id', $post->user_id) as $friend)
                {{-- {{$post->body}} --}}

                <div class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-800 p-4 rounded-xl border mb-4">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            @if($post->user->profile->image)
                                <img class="h-10 w-10 rounded-full" src="{{Storage::url($post->user->profile->image)}}"/>

                            @else
                                <img class="h-10 w-10 rounded-full" src="{{asset('img/user.svg')}}"/>
                            @endif
                            <div class="ml-3 text-sm leading-tight">
                                <a href="{{route('profile.show', $post->user)}}" class="text-black dark:text-white font-bold block ">{{$post->user->name}}</a>
                                <a href="{{route('profile.show', $post->user)}}" class="text-gray-500 dark:text-gray-400 font-normal block">{{'@'.$post->user->nickname}}</a>
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
                                            <div class="flex items-center justify-between cursor-pointer text-sm" x-on:click="open=true">
                                                <span class="mt-1">Eliminar</span>
                                                <div>
                                                    <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full hover:bg-red-500" x-on:click="open=false">No</a>

                                                    <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-100 bg-blue-600 rounded-full hover:bg-blue-500" wire:click="deleteId({{$post->id}})">Si</a>
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
                    <p class="text-gray-500 dark:text-gray-400 text-xs my-0.5">{{$post->created_at->format('d-m-Y h:i A')}}</p>

                    <div class="border-b border-gray-200 my-1"></div>
                    
                    @livewire('comment-heart', ['post'=>$post], key($post->id))               
                </div>
            @endforeach
        @endforeach

        @if($posts->hasPages())
            <div class="px-2 py-3">
                {{$posts->links()}}
            </div>
        @endif

    </div>

</div>