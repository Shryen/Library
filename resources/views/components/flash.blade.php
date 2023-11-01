@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="fixed bottom-10 right-10 bg-blue-400 text-xl text-semibold text-white p-4 rounded-2xl">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif