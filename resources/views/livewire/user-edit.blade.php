<div>
    <button wire:click="$set('open_edit',true)" class="bg-blue-900 text-white rounded-lg text-sm md:text-base py-1 md:py-2 px-2 md:px-3 mr-1 md:mr-2  hover:bg-blue-700 focus:outline-none transition">Editar perfil</button>

    <x-jet-dialog-modal wire:model="open_edit" maxWidth="lg">
        <x-slot name="title">
            <h1 class="text-center text-lg font-bold">Editar perfil</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-jet-label value="Nombre"/>
                        <x-jet-input type="text" class="w-full bg-gray-100" readonly disabled value="{{$profile->user->name}}"/>                    
                    </div>

                    <div>
                        <x-jet-label value="Usuario"/>
                        <x-jet-input type="text" class="w-full bg-gray-100" readonly disabled value="{{$profile->user->nickname}}"/>   
                    </div>    
                </div>
                
                <div class="mt-2">
                    <x-jet-label value="Biografía"/>
                    <x-jet-input type="text" class="w-full" wire:model="profile.biography"/>
                    @error('profile.biography')
                        <span class="text-xs font-semibold text-red-600">(*) {{$message}}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 space-y-2 mt-4">
                    <x-jet-label value="Imagen"/>
                    <div wire:loading wire:target="image" class="mt-2 bg-blue-100 border border-blue-400 text-blue-600 rounded px-4 py-1 text-sm">
                        <strong>Cargando imagen...</strong>
                        <span class="block sm:inline">Es pere un momento mientras la imagen se haya procesado.</span>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col rounded-lg border-2 border-dashed w-full h-48 p-10 group text-center">
                            <div class="h-full w-full text-center flex items-center justify-center">
                                <div class="max-h-48 mx-auto">
                                    @if ($image)
                                        <img class="h-40 w-40 rounded-lg" src="{{$image->temporaryUrl()}}" alt="">
                                    @else
                                        @if ($profile->image)
                                            <img class="h-40 w-40 rounded-lg" src="{{Storage::url($profile->image)}}" alt/>
                                        @else
                                            <img class="h-40 w-40 rounded-lg" src="{{asset('img/user.svg')}}" alt/>
                                        @endif
                                        
                                    @endif
                                </div>
                                
                            </div>
                            <input type="file" class="hidden" wire:model="image" id="{{$identificador}}">
                        </label>
                        @error('image')
                            <span class="text-xs font-semibold text-red-600">(*) {{$message}}</span>
                        @enderror
                        
                    </div>
                </div>

            </div>            

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

