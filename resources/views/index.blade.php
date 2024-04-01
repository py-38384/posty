<x-layout>
    <x-container>
        <h1 class="text-4xl font-bold text-slate-700">Welcome to Posty</h1>
    </x-container>
    @if (count($posts)>0)
    <x-container>
        <div class="w-full flex flex-col gap-3 justify-center items-start">
            @if ($posts)
            @foreach ($posts as $post)
            <x-post :post=$post />
            @endforeach
            @endif
        </div>
    </x-container>
    @endif
    @if($posts->hasPages())
    <x-container>
        <div class="w-full">{{$posts->links()}}</div>
    </x-container>
    @endif
</x-layout>