<div  class="bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-800 p-4 rounded-xl border mb-4 bg-gradient-to-r from-green-400 to-blue-500">
            
    <div class="flex">
        @if(auth()->user()->profile->image)
            <img class="h-10 w-10 rounded-full mr-2" src="{{Storage::url(auth()->user()->profile->image)}}"/>
        @else
            <img class="h-10 w-10 rounded-full mr-2" src="{{asset('img/user.svg')}}"/>
        @endif

        <input wire:model="body" class="rounded focus:outline-none border-gray-200  text-gray-600 font-medium text-base w-full px-2 py-1 flex-1" placeholder="¿Qué opinas?"></input> 

    </div>

    @error('body')
        <div class="inline-block mx-4">
            <span class="text-xs font-semibold text-blue-600">(*) El campo es requerido con un máx. de 100 caracteres.</span>
        </div>
    @enderror


    <div class="grid grid-cols-1 mt-4">

        <div class="w-full">

            <label class='flex flex-col border-2 border-dashed w-full h-44 hover:bg-gray-100 hover:border-purple-300 group'>
            
                @if ($image)
                    <div class='flex flex-col items-center justify-center py-2 cursor-pointer'>
                        <img class="h-40 w-40 rounded-lg" src="{{$image->temporaryUrl()}}" alt="">
                    </div>
                @else
                    <div class='flex flex-col items-center justify-center pt-12 cursor-pointer'>
                        <svg class="w-10 h-10 text-red-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>

                        <p class='lowercase text-sm text-red-400 group-hover:text-red-600 pt-1 tracking-wider'>Seleccione una foto</p>
                    </div>
                @endif

                <input type='file' class="hidden" wire:model="image" id="{{$identificador}}" />
            </label>

            @error('image')
                <div class="mt-1">
                    <span class="text-xs font-semibold text-blue-600">(*) La imagen es requerida con un tamaño de 2048 KB</span>
                </div>
            @enderror
            
        </div>
    </div>


    <div class="flex justify-end items-center mt-2">       

        <button wire:loading.attr="disabled"
                wire:target="savePost"
                wire:click="savePost" 
                class="px-2 py-1 bg-red-500 hover:bg-red-400 text-white rounded">
            Postear
        </button>
        
    </div>
    
</div>

