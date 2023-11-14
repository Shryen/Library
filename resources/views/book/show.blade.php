<x-layout>
    <x-section class="max-w-4xl">
        <a
            href="/books/index"class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-800">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path class="fill-current"
                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
            Back to books
        </a>
        <div class="flex flex-col lg:flex-row">
            <div class="border-r">
                <img src={{ asset('storage/' . $book->thumbnail) }} width="800px" class="p-2 border-b"
                    alt="{{ $book->title }}">
                <div class="pl-2 space-y-2">
                    <p class="text-sm">Release year: {{ $book->year }}</p>
                    <p class="text-sm">Author: <a href="/books/index?author={{ $book->author }}"
                            class="text-sm text-blue-800">{{ $book->author }}</a></p>
                </div>
            </div>
            <div class="space-y-2 p-2 text-justify leading-6">
                <h1 class="text-3xl font-semibold">{{ $book->title }}</h1>
                {!! $book->body !!}
            </div>
        </div>
        <hr />
        <div>
            @guest
                <p class="text-sm pl-2 mt-5"><a href="/login" class="text-blue-800">Log in</a> to rate this book.</p>
            @endguest
            <div class="grid grid-cols-2">
                @if ($book->rates->count())
                    <div class="text-lg pl-2 mt-5 cols-span-1">
                        <p>Rates: {{ $book->rates->avg('rate') }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </div>
                @else
                    <p class="text-sm italic text-yellow-400">No rates yet. Be the first!</p>
                @endif
                <div class="flex justify-end cols-span-1 text-lg pl-2 mt-5" x-data="{ open: false }">

                </div>
            </div>
            @auth
                @if (request()->user()->id == $book->rates->pluck('user_id')->contains(request()->user()->id))
                    <p class="text-sm pl-2 text-red-500 mt-5">You already voted!</p>
                @else
                    <form action="/book/{{ $book->slug }}/rates" method="POST" class="text-sm text-red-500 pl-2 mt-5">
                        @csrf
                        <div class="flex">
                            <input type="radio" value='1' id='1' name='rate'>
                            <label for="1"><svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </label>
                            <input type="radio" value='2' id='2' name='rate'>
                            <label for="2"><svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </label>
                            <input type="radio" value='3' id='3' name='rate'>
                            <label for="3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </label>
                            <input type="radio" value='4' id='4' name='rate'>
                            <label for="4"><svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </label>
                            <input type="radio" value='5' id='5' name='rate'>
                            <label for="5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </label>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-800 text-white rounded-xl hover:bg-blue-500 transition-all">Rate</button>
                    </form>
                @endif
            @endauth
            <form action="/addCart" method="POST" class="flex justify-end">
                @csrf
                <input type="hidden" name="book_id" value={{ $book->id }}>
                <x-primary-button>Add to cart</x-primary-button>
            </form>
        </div>
    </x-section>
</x-layout>
