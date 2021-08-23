<div class="page-content pt-6 h-full">
    <div class="mx-auto container px-2 md:px-0">


        <div class="mx-auto flex justify-center items-center bg-white rounded py-3 mb-6 px-4 ">
            
            <input wire:model="search" type="text" placeholder="buscar..." class="border px-4 text-sm bg-gray-200 rounded-sm" style="width: 300px" />

        </div>


        <div class="grid md:grid-cols-3 gap-6">
            
            @forelse($users as $user)
            <div class="col-span-1">
                <div class=" ">
                    <div>
                        <div class="bg-white relative shadow p-2 rounded-lg text-gray-800 hover:shadow-lg">
                            <div class="right-0 mt-4 rounded-l-full absolute text-center font-bold text-xs text-white px-2 py-1 bg-blue-500">
                                {{$user->posts->count()}} posts
                            </div>

                            <img src="{{asset('img/fondo.jpg')}}" class="h-32 rounded-lg w-full object-cover">

                            <div class="flex justify-center">
                                @if($user->profile->image)
                                    <img src="{{$user->profile->image}}" class="h-32 rounded-lg w-full object-cover">
                                @else
                                    <img src="{{asset('img/user.svg')}}" class="rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-16 w-16">
                                @endif
                            </div>
                            <div class="py-1 px-2">
                                <div class="text-center leading-5 mb-5">
                                    <a class="font-bold" href="{{route('profile.show', $user)}}">{{$user->name}}</a><br>
                                    <a class="text-sm">{{'@'.$user->nickname}}</a>
                                </div>

                                @livewire('follow-button', ['user' => $user], key($user->id))

                            </div>
                        </div>
                    </div>

                </div>
            </div> 
            @empty
                <div>
                    No hay registros de búsqueda.
                </div>
            @endforelse 
        </div>
        <div class="py-4">
            {{$users->links()}}
        </div>
    </div>
</div>


