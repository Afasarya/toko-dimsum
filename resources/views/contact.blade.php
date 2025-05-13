<!-- filepath: e:\Kelas-12\Joki\Okami\okami-dimsum\resources\views\contact.blade.php -->
@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-64 md:h-80" style="background-image: url('{{ asset('images/contact-hero.jpg') }}')">
        <div class="absolute inset-0 bg-dark bg-opacity-70"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Contact Us</h1>
            <p class="text-lg text-light max-w-xl">
                We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>
    </div>

    <!-- Contact Information Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-light rounded-xl p-8 text-center shadow-soft transform transition hover:-translate-y-1 hover:shadow-hover">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary text-white mb-6">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Visit Us</h3>
                    <p class="text-gray-600">
                        123 Dimsum Street<br>
                        Jakarta, Indonesia<br>
                        12345
                    </p>
                </div>

                <div class="bg-light rounded-xl p-8 text-center shadow-soft transform transition hover:-translate-y-1 hover:shadow-hover">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary text-white mb-6">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Call Us</h3>
                    <p class="text-gray-600">
                        Customer Service:<br>
                        +62 812-3456-7890<br>
                        Monday - Sunday: 10am - 10pm
                    </p>
                </div>

                <div class="bg-light rounded-xl p-8 text-center shadow-soft transform transition hover:-translate-y-1 hover:shadow-hover">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary text-white mb-6">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Email Us</h3>
                    <p class="text-gray-600">
                        General Inquiries:<br>
                        info@okamidimsum.com<br>
                        Customer Support: support@okamidimsum.com
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map Section -->
    <section class="py-16 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-soft p-8">
                    <h2 class="text-2xl font-bold text-dark mb-6">Send us a Message</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-dark font-medium mb-2">Your Name</label>
                                <input type="text" id="name" name="name" class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-dark font-medium mb-2">Your Email</label>
                                <input type="email" id="email" name="email" class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-dark font-medium mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary" value="{{ old('subject') }}" required>
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="message" class="block text-dark font-medium mb-2">Your Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <button type="submit" class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-secondary transition-colors shadow-md flex items-center">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Map -->
                <div class="rounded-xl overflow-hidden shadow-soft h-[500px]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65086637408!2d106.68942536557394!3d-6.229386704524606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1633855983772!5m2!1sen!2sus" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Hours -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-dark">Business Hours</h2>
                <div class="h-1 w-24 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="max-w-3xl mx-auto bg-light rounded-xl shadow-soft p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-dark mb-4">Restaurant</h3>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium">11:00 AM - 10:00 PM</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium">10:00 AM - 11:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium">10:00 AM - 9:00 PM</span>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-dark mb-4">Delivery Service</h3>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium">11:00 AM - 9:30 PM</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium">10:30 AM - 10:30 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium">10:30 AM - 8:30 PM</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        <span class="text-primary font-medium">Note:</span> Last orders are accepted 30 minutes before closing time.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-16 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-dark">Frequently Asked Questions</h2>
                <div class="h-1 w-24 bg-primary mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                    Find answers to the most common questions about our food, services, and delivery.
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-6">
                <div class="bg-white rounded-xl shadow-soft overflow-hidden">
                    <button class="w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-dark">Do you offer delivery services?</h3>
                            <svg class="faq-icon h-5 w-5 text-primary transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Yes, we offer delivery services within a 10 km radius from our restaurant. Delivery is free for orders over Rp 200.000. For smaller orders, a delivery fee of Rp 15.000 applies.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-soft overflow-hidden">
                    <button class="w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-dark">Can I customize my dimsum order?</h3>
                            <svg class="faq-icon h-5 w-5 text-primary transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            We offer some customization options for specific dishes. You can request modifications like less spicy, no garlic, etc. Please note that we may not be able to accommodate all requests due to our authentic recipe standards.
                        </p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-soft overflow-hidden">
                    <button class="w-full text-left p-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-dark">Do you cater for events and parties?</h3>
                            <svg class="faq-icon h-5 w-5 text-primary transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Yes, we provide catering services for events of all sizes. Please contact us at least 3 days in advance for small events and 1 week for large events. Custom menus and packages are available.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="bg-primary py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Ready to Experience Authentic Dimsum?</h2>
            <p class="text-white text-opacity-90 mb-8 max-w-3xl mx-auto">
                Visit our restaurant or order online today for a taste of premium quality dimsum made with care.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('menu') }}" class="px-8 py-3 bg-white text-primary font-medium rounded-full hover:bg-accent hover:text-dark transition-colors duration-300 shadow-md">
                    Order Online
                </a>
                <a href="tel:+6281234567890" class="px-8 py-3 border-2 border-white text-white font-medium rounded-full hover:bg-white hover:text-primary transition-colors duration-300">
                    Call Now
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFaq(button) {
        // Toggle answer visibility
        const answer = button.nextElementSibling;
        const icon = button.querySelector('.faq-icon');
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            answer.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endpush