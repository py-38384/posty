@props(['post'])
<div>
    <div class="flex flex-row items-center gap-2">
        <div class="font-bold">{{'@'}}{{$post->user->username}}</div><span class="text-gray-400 inline-block text-[13px]"> {{$post->created_at->diffForHumans()}}</span>
        @if($post->user_id==auth()->id())
        <a class="text-sky-500 hover:underline cursor-pointer" href="{{route('posts.edit',$post->id)}}">edit</a><span class="text-red-500 hover:underline cursor-pointer" onclick="init_delete(this,{{$post->id}})">delete</span><span class="hidden text-sky-500 hover:underline cursor-pointer cancel_id_{{$post->id}}">cancel</span>
        <form class="hidden confirm_id_{{$post->id}}" method="POST" action="{{ route('posts.delete',$post->id) }}">
            @method('delete') 
            @csrf 
            <button class="inline text-red-500 hover:underline" type="submit">confirm</button>
        </form>
        @endif

    </div>
    <p class="text-slate-500">{{$post->post}}</p>
</div>