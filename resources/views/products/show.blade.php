<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="md:flex">
                    <!-- Product Image -->
                    <div class="md:flex-shrink-0 md:w-1/3">
                        @if($product->image)
                            <img class="h-44 w-full object-cover md:h-full md:w-full" 
                                 src="{{ Storage::url('products/' . $product->image) }}" 
                                 alt="{{ $product->name }}">
                        @else
                            <div class="h-64 w-full bg-gray-200 flex items-center justify-center md:h-full">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <!-- Product Details -->
                    <div class="p-8 md:w-1/2">
                        <div class="uppercase tracking-wide text-sm text-indigo-600 font-semibold">
                            {{ $product->category->name ?? 'No Category' }}
                        </div>
                        <h1 class="block mt-1 text-2xl font-medium text-gray-900">{{ $product->name }}</h1>
                        <p class="mt-3 text-lg text-gray-700">{{ $product->description }}</p>
                        <div class="mt-4">
                            <span class="text-3xl font-bold text-gray-900">{{ number_format($product->price, 2) }} MKD</span>
                        </div>
                        <div class="mt-6 flex items-center space-x-4">
                            <a href="{{ route('products.edit', $product->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('A jeni i sigurtë që dëshironi të fshini këtë produkt?')"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ url()->previous() }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>