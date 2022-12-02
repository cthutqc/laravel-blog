<x-app-layout>
    <x-container>
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
