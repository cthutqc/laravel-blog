<x-app-layout>
    <x-container>
        {{ Breadcrumbs::render('categories') }}
        <div class="space-y-5">
            @each('categories.item', $categories, 'category', 'categories.no-items')
        </div>
    </x-container>
</x-app-layout>
