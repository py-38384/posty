<x-layout>
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-center">
            <h3 class="text-slate-700 text-4xl mb-3">Create Post</h3>
            <form class="w-[40%] max-md:w-[70%] max-sm:w-[100%]" action="{{ route('posts.update',$current_post->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-4">
                    <textarea name="post" placeholder="Post Something" id="post" style="resize: none; overflow:hidden"
                        class="bg-gray-100 w-full border @error('post') border-red-500 @else border-gray-200 @enderror p-1">{{$current_post->post}}</textarea>
                    @error('post')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                </div>
            </form>
        </div>
    </x-container>
    @if (count($posts)>0)
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-start">
            @foreach ($posts as $post)
            <x-post :post=$post />
            @endforeach
        </div>
    </x-container>
    @endif
    @if($posts->hasPages())
    <x-container>
        <div class="w-full">{{$posts->links()}}</div>
    </x-container>
    @endif
</x-layout>
