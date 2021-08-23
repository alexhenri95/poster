<div>
    
    @if($user->id != auth()->user()->id)

        @if($friend->where('user_id', auth()->user()->id)->count() )

            <div wire:click="deleteFriend('{{auth()->user()->id}}','{{$user->id}}')" class="text-sm font-light text-center my-2">
                <a  class="bg-blue-400 px-4 py-1 rounded text-white text-sm font-semibold cursor-pointer">
                    Siguiendo
                </a>
            </div>

        @else

            <div wire:click="saveFriend"  class="text-sm font-light text-center my-2">
                <a  class="bg-blue-400 px-4 py-1 rounded text-white text-sm font-semibold cursor-pointer">
                    Seguir
                </a>
            </div>

        @endif
    @endif
    
</div>


