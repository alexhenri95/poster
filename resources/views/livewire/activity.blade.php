<div class="container bg-white mx-auto rounded my-6 p-4">
    <h1 class="font-bold">Actividad reciente</h1>
    <div class="py-4">

        <div class="grid md:grid-cols-2 gap-x-6">

            <div class="col-span-1">
                <div class="border-b border-gray-200 font-semibold">
                    Comentarios
                </div>

                <div>
                    <ul class="py-2">
                    @foreach($comments->take(10) as $comment)
                        @foreach($posts->where('id', $comment->post_id) as $post)
                                <a href="{{route('post.show', $post->id)}}" class="flex items-start px-4 py-3 border-b hover:bg-gray-100 mx-2">

                                    <img class="h-10 w-10 object-cover rounded" src="{{Storage::url($post->image)}}" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        
                                            <span class="font-bold" href="#">{{$comment->user->nickname}}</span> comentó: <span class="font-bold text-blue-500" href="#">{{Str::limit($comment->body, 100)}}</span> en tu post <span class="font-semibold text-blue-500">{{Str::limit($comment->post->body, 40)}}</span>
                                        <br>
                                        <span class="text-xs">{{$comment->created_at->diffForHumans()}}</span>
                                    </p>

                                </a>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-span-1">
                <div class="border-b border-gray-200 font-semibold">
                    Me Gusta
                </div>
                <div>
                    <ul class="py-2">

                    @foreach($hearts->take(10) as $heart)
                        @foreach($posts->where('id', $heart->post_id) as $post)
                                <a href="{{route('post.show', $post->id)}}" class="flex items-start px-4 py-3 border-b hover:bg-gray-100 mx-2">
                                    {{-- {{$heart}} --}}
                                    <img class="h-10 w-10 object-cover rounded" src="{{Storage::url($post->image)}}" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        
                                            <span class="font-bold" href="#">A {{$heart->user->nickname}} {{$post->name}}</span> le gustó tu post <span class="font-semibold text-blue-500" href="#">{{Str::limit($post->body, 40)}}</span>
                                        
                                        <br>
                                        <span class="text-xs">{{$heart->created_at->diffForHumans()}}</span>
                                    </p>
                                </a>
                        @endforeach
                    @endforeach
                    
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
