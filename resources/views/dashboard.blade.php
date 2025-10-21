<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Action Buttons - 4 Butona SIPAS RENDIT TË KËRKUM -->
            <div class="mb-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
                    <!-- 1. View Products -->
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        View Products
                    </a>

                    <!-- 2. New Product -->
                    <a href="{{ route('products.create') }}" 
                       class="inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        New Product
                    </a>

                    <!-- 3. View Categories -->
                    <a href="{{ route('categories.index') }}" 
                       class="inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        View Categories
                    </a>

                    <!-- 4. New Category -->
                    <a href="{{ route('categories.create') }}" 
                       class="inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        New Category
                    </a>
                </div>

                <!-- Quick Stats - Në të njëjtin rresht me butonat në desktop, poshtë në mobile -->
                <div class="flex flex-col sm:flex-row gap-4 mt-6 justify-between items-center">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium">Total Products:</span> 
                        <span class="font-bold text-blue-600">{{ $products->total() }}</span>
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <span class="font-medium">Quick Stats:</span>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                            Active
                        </span>
                    </div>
                </div>
            </div>

            <!-- Search Section - TANI POSHTË BUTONAVE -->
            <div class="mb-8">
                <form method="GET" action="{{ route('dashboard') }}" class="flex gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Search products, categories, or descriptions..."
                                class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            >
                        </div>
                    </div>
                    <button 
                        type="submit"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                    @if(request('search'))
                    <a 
                        href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200"
                    >
                        Clear
                    </a>
                    @endif
                </form>
            </div>

            <!-- Products Table -->
            @if($products->count() > 0)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Products</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-500 to-indigo-600">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    Product
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    Category
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors duration-150 ease-in-out">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($product->image)
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-lg object-cover" 
                                                     src="{{ Storage::url('products/' . $product->image) }}" 
                                                     alt="{{ $product->name }}">
                                            </div>
                                        @else
                                            <div class="h-10 w-10 flex-shrink-0 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <a href="{{ route('products.show', $product->id) }}" 
                                               class="text-sm font-medium text-gray-900 hover:text-indigo-600 transition-colors duration-200">
                                                {{ $product->name }}
                                            </a>
                                            <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($product->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ number_format($product->price, 2) }}€
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $product->category->name ?? 'No Category' }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.show', $product->id) }}" 
                                           class="inline-flex items-center justify-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                                            View
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="inline-flex items-center justify-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('A jeni i sigurtë që dëshironi të fshini këtë produkt?')"
                                                    class="inline-flex items-center justify-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $products->links() }}
                </div>
            </div>
            @else
            <!-- No Products Message -->
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No products found</h3>
                <p class="mt-2 text-sm text-gray-500">
                    @if(request('search'))
                        No products match your search criteria. Try a different search term.
                    @else
                        Get started by creating your first product.
                    @endif
                </p>
                <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-medium rounded-lg transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create Product
                    </a>
                    @if(request('search'))
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-300">
                        Clear Search
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>