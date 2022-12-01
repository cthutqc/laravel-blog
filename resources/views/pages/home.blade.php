<x-app-layout>
    <x-container>
        <div class="space-y-5">
            @each('posts.item', $posts, 'post', 'posts.no-items')
        </div>
    </x-container>
</x-app-layout>
