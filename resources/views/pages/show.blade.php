<x-app-layout>
    <x-container>
        {{ Breadcrumbs::render('page', $page) }}
        <x-h1>
            {{$page->name}}
        </x-h1>
        <x-card>
            <p>
                {!! $page->text !!}
            </p>
        </x-card>
    </x-container>
</x-app-layout>
