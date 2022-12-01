<x-card>
    <a href="{{route('posts.show', $post)}}" class="text-lg font-bold">{{$post->name}}</a>
    <p class="text-slate-400 text-sm text-bold">Published in <a href="{{route('categories.show', $post->category)}}">{{$post->category->name}}</a></p>
    <p class="text-slate-400 text-xs">{{$post->created_at}}</p>
    <p>
        {!! Str::limit($post->text, 100, '....') !!}
    </p>
    <a href="{{route('posts.show', $post)}}" class="text-blue-600 hover:underline">Read more</a>
</x-card>
