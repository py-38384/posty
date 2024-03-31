<x-layout>
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-center">
            <h3 class="text-slate-700 text-4xl mb-3">Create Post</h3>
            <form class="w-[40%] max-md:w-[70%] max-sm:w-[100%]" action="{{ route('post.create') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <textarea name="post" placeholder="Post Something" id="post" style="resize: none; overflow:hidden"
                        class="bg-gray-100 w-full border @error('post') border-red-500 @else border-gray-200 @enderror p-1"></textarea>
                    @error('post')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Post</button>
                </div>
            </form>
        </div>
    </x-container>
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-start">
            @if ($posts)
            @foreach ($posts as $post)
                <div>
                    <div class="flex flex-row items-center gap-2">
                        <div class="font-bold">{{'@'}}{{$post->user->username}}</div><span class="text-gray-400 inline-block text-[13px]"> {{$post->created_at->diffForHumans()}}</span><a class="text-sky-500 hover:underline cursor-pointer">edit</a><span class="text-red-500 hover:underline cursor-pointer" onclick="init_delete(this,{{$post->id}})">delete</span><span class="hidden text-sky-500 hover:underline cursor-pointer cancel_id_{{$post->id}}">cancel</span>
                        <form class="hidden confirm_id_{{$post->id}}" method="POST" action="{{ route('post.delete',$post->id) }}">
                            @method('delete') 
                            @csrf 
                            <button class="inline text-red-500 hover:underline" type="submit">confirm</button>
                        </form>
                    </div>
                    <p class="text-slate-500">{{$post->post}}</p>
                </div>
            @endforeach
            @endif
        </div>
    </x-container>
</x-layout>
