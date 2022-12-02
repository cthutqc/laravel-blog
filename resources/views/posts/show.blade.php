<x-app-layout>
    <x-container>
        {{ Breadcrumbs::render('post', $post) }}
        <x-h1>
            {{$post->name}}
        </x-h1>
        <p class="text-slate-400 text-sm text-bold">Published in <a href="{{route('categories.show', $post->category)}}">{{$post->category->name}}</a></p>
        <p class="text-slate-400 text-xs">{{$post->created_at}}</p>
        <x-card>
            <p>
                {!! $post->text !!}
            </p>
        </x-card>
        <x-title>
            Tags
        </x-title>
        <div class="flex justify-start space-x-2">
            @each('tags.item', $post->tags, 'tag', 'tags.no-items')
        </div>
    </x-container>
</x-app-layout>
