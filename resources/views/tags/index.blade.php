<x-app-layout>
    <x-container>
        <div class="flex space-x-2 space-y-2 flex-row">
            @each('tags.item', $tags, 'tag', 'tags.no-items')
        </div>
    </x-container>
</x-app-layout>
