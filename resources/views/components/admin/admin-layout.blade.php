<x-layout>
    <x-section class="flex max-w-4xl">
        <div class="flex w-52">
            <div class="w-full flex flex-col">
                <h1 class="text-xl font-semibold border-b border-gray-400 w-full">Links</h1>
                <x-admin.menu-item href="/admin/index" :active="request()->is('admin/index')"> All Books </x-admin.menu-item>
                <x-admin.menu-item href="/admin/create" :active="request()->is('admin/create')"> Add Books </x-admin.menu-item>
                <x-admin.menu-item href="/admin/orders" :active="request()->is('admin/orders')"> All Orders </x-admin.menu-item>
            </div>
        </div>
        <div class="flex-1 border border-gray-400 rounded-r-lg rounded-tl-lg">
            {{$slot}}
        </div>
    </x-section>
</x-layout>