<x-app-layout>
    <x-container>
        {{ Breadcrumbs::render('posts') }}
        <div class="space-y-5">
            @each('posts.item', $posts, 'post', 'posts.no-items')
        </div>
        {{$posts->links()}}
    </x-container>
</x-app-layout>
