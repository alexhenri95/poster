<div>
     <div class="text-gray-500 dark:text-gray-400 flex justify-between mt-1">
        <div class="flex items-center">
            @if($heart->where('user_id', auth()->user()->id)->count() )
                <div wire:click="deleteHeart('{{auth()->user()->id}}','{{$post->id}}')" class="cursor-pointer" wire:loading.attr="disabled" wire:target="deleteHeart('{{auth()->user()->id}}','{{$post->id}}')">
                    <svg class="w-5 h-5 text-red-600" fill="red" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
            @else
                <div wire:click="saveHeart" wire:loading.attr="disabled" wire:target="saveHeart" class="cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
            @endif
            

            <span class="ml-1 mt-1 text-sm">
                {{$heart->count()}} Me gusta
            </span>
        </div>


        <div class="flex items-center cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            <span class="flex ml-1">
                <span class="mr-1">{{$comment->count()}} </span>
                
                 @livewire('comments', ['post' => $post ], key($post->id))
            </span>

           
        </div>
    </div>


    <div class="pt-2 mt-2 flex">
        <input  wire:model.defer="body" class="border-b outline-none focus:outline-none border-gray-200  text-gray-600 font-medium text-base w-full px-2 py-1 flex-1" placeholder="¿Qué opinas?"></input>

        <div class="ml-2">
            <button wire:click="saveComentario"  class="px-2 py-1 bg-blue-500 text-white rounded">Comentar</button>
        </div>
    </div>
</div>

