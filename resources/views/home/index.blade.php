@extends('layouts.app')

@section('title', 'Welcome to Okami Dimsum')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-center bg-cover h-96" style="background-image: url('{{ asset('images/bannerhd.jpg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="text-white max-w-lg">
                <h1 class="text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl">
                    Authentic <span class="text-accent">Dimsum</span> Delivery
                </h1>
                <p class="mt-4 text-xl">
                    Experience the taste of premium handcrafted dimsum delivered to your doorstep.
                </p>
                <div class="mt-8">
                    <a href="{{ route('menu') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary transition duration-300">
                        Order Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Categories -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Browse By Category</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Explore our wide variety of dimsum categories
                </p>
            </div>

            <div class="mt-12 grid gap-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($categories as $category)
                    <a href="{{ route('menu', ['category' => $category->slug]) }}" class="group">
                        <div class="relative overflow-hidden rounded-lg shadow-md h-60 transition transform hover:scale-105">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/category-placeholder.jpg') }}" 
                                alt="{{ $category->name }}" 
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <h3 class="text-xl font-semibold text-white">{{ $category->name }}</h3>
                                <p class="text-sm text-gray-200 mt-1">
                                    {{ $category->products_count ?? '0' }} Products
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Featured Products</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Our most popular and loved dimsum
                </p>
            </div>

            <div class="mt-12 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 hover:shadow-lg">
                        <a href="{{ route('menu.show', $product->slug) }}">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/product-placeholder.jpg') }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('menu.show', $product->slug) }}" class="block">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                            </a>
                            <p class="mt-1 text-gray-500 text-sm">{{ $product->category->name }}</p>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-primary font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="inline-flex items-center justify-center p-2 rounded-full text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-10 text-center">
                <a href="{{ route('menu') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary transition duration-300">
                    View All Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Popular Products Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Most Popular</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Our customers' favorites
                </p>
            </div>

            <div class="mt-12 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($popularProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 hover:shadow-lg">
                        <a href="{{ route('menu.show', $product->slug) }}">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/product-placeholder.jpg') }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-40 object-cover">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('menu.show', $product->slug) }}" class="block">
                                <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                            </a>
                            <p class="mt-1 text-gray-500 text-sm">{{ $product->category->name }}</p>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-primary font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="inline-flex items-center justify-center p-2 rounded-full text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-accent bg-opacity-20 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Why Choose Us</h2>
            </div>

            <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="rounded-full bg-primary bg-opacity-10 p-3 inline-flex mx-auto">
                        <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">Premium Quality</h3>
                    <p class="mt-2 text-gray-600">
                        We use only the freshest ingredients to ensure the best taste and quality.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="rounded-full bg-primary bg-opacity-10 p-3 inline-flex mx-auto">
                        <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">Fast Delivery</h3>
                    <p class="mt-2 text-gray-600">
                        We deliver your favorite dimsum straight to your door in the shortest time possible.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="rounded-full bg-primary bg-opacity-10 p-3 inline-flex mx-auto">
                        <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">Secure Payment</h3>
                    <p class="mt-2 text-gray-600">
                        Multiple payment options available with secure processing for your peace of mind.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">What Our Customers Say</h2>
            </div>

            <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                            <img src="{{ asset('images/team-1.png') }}" alt="Customer" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Lisa Wijaya</h4>
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "The dimsum from Okami is absolutely delicious! The flavors are authentic, and the delivery is always prompt. Will order again for sure!"
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                            <img src="{{ asset('images/team-2.png') }}" alt="Customer" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Vio</h4>
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "Great value for money! The portions are generous and the quality is top-notch. The hakau and siomai are my personal favorites."
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                            <img src="{{ asset('images/team-3.png') }}" alt="Customer" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Anita Dewi</h4>
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "I ordered for a family gathering and everyone loved it! The packaging kept everything fresh and the online ordering process was seamless."
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection