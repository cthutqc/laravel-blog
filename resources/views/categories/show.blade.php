<x-app-layout>
    <x-container>
        {{ Breadcrumbs::render('category', $category) }}
        <x-h1>
            {{$category->name}}
        </x-h1>
        <div class="space-y-5">
            @each('posts.item', $posts, 'post', 'posts.no-items')
        </div>
        {{$posts->links()}}
    </x-container>
</x-app-layout>
