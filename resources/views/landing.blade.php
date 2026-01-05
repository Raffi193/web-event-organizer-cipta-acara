<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CiptaAcara - Professional Event Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/background-landing.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-overlay {
            background: rgba(104, 34, 210, 0.9);
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .testimonial-card {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .whatsapp-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
        }
    </style>
</head>

<body class="text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-16 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-gray-800">CiptaAcara</a>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#home" class="text-gray-800 hover:text-indigo-800">Home</a>
                    <a href="#about" class="text-gray-800 hover:text-indigo-800">About</a>
                    <a href="#services" class="text-gray-800 hover:text-indigo-800">Services</a>
                    <a href="#portfolio" class="text-gray-800 hover:text-indigo-800">Portfolio</a>
                    <a href="#testimonials" class="text-gray-800 hover:text-indigo-800">Testimonials</a>
                    <a href="#contact" class="text-gray-800 hover:text-indigo-800">Contact</a>
                    <a href="/order"
                        class="bg-indigo-800 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300">Booking
                        Sekarang</a>
                </div>
                <div class="md:hidden">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mobile-menu hidden md:hidden">
                <div class="flex flex-col mt-4 space-y-2">
                    <a href="#home" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">Home</a>
                    <a href="#about" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">About</a>
                    <a href="#services" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">Services</a>
                    <a href="#portfolio" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">Portfolio</a>
                    <a href="#testimonials" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">Testimonials</a>
                    <a href="#contact" class="block px-3 py-2 text-gray-800 hover:text-indigo-800">Contact</a>
                    <a href="/order"
                        class="block bg-indigo-800 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-center transition duration-300">Booking
                        Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section h-screen flex items-center justify-center text-white">
        <div class="container mx-auto px-16 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6" style="font-family: 'Playfair Display', serif;">
                Kami Urus Acaranya, Kamu Nikmati Momen Bahagianya
            </h1>
            <p class="text-md md:text-lg mb-10 max-w-3xl mx-auto">Kami siap melayani, dari pernikahan yang sakral hingga
                momen wisuda yang penuh kebanggaan, CiptaAcara.co hadir sebagai partner terpercaya untuk merancang,
                mengatur, dan mengeksekusi setiap detail acara Anda. Dengan pengalaman dan dedikasi tinggi, kami
                memastikan segalanya berjalan lancar dan sesuai impian - agar Anda bisa fokus menikmati setiap detik
                berharga bersama orang-orang tercinta, tanpa harus repot mengurus hal teknis.</p>
            <a href="/order"
                class="bg-indigo-800 hover:bg-indigo-700 text-white px-8 py-4 rounded-md text-xl font-medium transition duration-300">Booking
                Sekarang</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="container mx-auto px-16">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                    <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Momenta EO Team" class="rounded-lg shadow-lg w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6">Tentang CiptaAcara.co</h2>
                    <p class="text-lg mb-6">CiptaAcara.co adalah event organizer profesional yang berdedikasi untuk
                        merancang dan mengeksekusi momen-momen penting dalam hidup Anda dengan penuh makna dan detail
                        yang sempurna.</p>
                    <p class="text-lg mb-6">Kami melayani berbagai jenis acara, mulai dari pernikahan, wisuda, ulang
                        tahun, gathering, hingga acara perusahaan. Dengan tim kreatif dan berpengalaman, kami percaya
                        setiap momen punya cerita — dan tugas kami adalah membantu Anda menjadikannya tak terlupakan.
                    </p>
                    <div class="flex flex-wrap mt-8">
                        <div class="w-full md:w-1/2 mb-6">
                            <div class="flex items-center">
                                <div class="bg-indigo-800 text-white rounded-full p-3 mr-4">
                                    <i class="fas fa-check text-xl"></i>
                                </div>
                                <span class="font-medium">10+ Tahun Pengalaman</span>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 mb-6">
                            <div class="flex items-center">
                                <div class="bg-indigo-800 text-white rounded-full p-3 mr-4">
                                    <i class="fas fa-check text-xl"></i>
                                </div>
                                <span class="font-medium">500+ Acara Sukses</span>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 mb-6">
                            <div class="flex items-center">
                                <div class="bg-indigo-800 text-white rounded-full p-3 mr-4">
                                    <i class="fas fa-check text-xl"></i>
                                </div>
                                <span class="font-medium">Tim Profesional</span>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 mb-6">
                            <div class="flex items-center">
                                <div class="bg-indigo-800 text-white rounded-full p-3 mr-4">
                                    <i class="fas fa-check text-xl"></i>
                                </div>
                                <span class="font-medium">Garansi Kepuasan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20">
        <div class="container mx-auto px-16">
            <h2 class="text-3xl font-bold text-center mb-16">Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-microphone text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">MC (Master of Ceremony)</h3>
                    <p class="text-gray-600 text-center">MC profesional untuk memandu acara Anda dengan lancar dan
                        menghibur, menciptakan atmosfer yang tepat sesuai tema acara.</p>
                </div>

                <!-- Service 2 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-camera text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Photographer</h3>
                    <p class="text-gray-600 text-center">Jasa fotografi profesional untuk mengabadikan momen berharga
                        dalam acara Anda dengan kualitas terbaik.</p>
                </div>

                <!-- Service 3 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-paint-brush text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Decoration</h3>
                    <p class="text-gray-600 text-center">Dekorasi kreatif dan elegan sesuai tema acara Anda,
                        menciptakan suasana yang memukau bagi tamu undangan.</p>
                </div>

                <!-- Service 4 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-utensils text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Catering</h3>
                    <p class="text-gray-600 text-center">Layanan catering dengan menu lezat dan presentasi menarik
                        untuk memanjakan tamu undangan Anda.</p>
                </div>

                <!-- Service 5 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-palette text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">MUA (Makeup Artist)</h3>
                    <p class="text-gray-600 text-center">Makeup artist profesional untuk membuat Anda tampil sempurna
                        di hari istimewa dengan riasan yang tahan lama.</p>
                </div>

                <!-- Service 6 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-music text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Hiburan (Entertainment)</h3>
                    <p class="text-gray-600 text-center">Berbagai pilihan hiburan seperti band, DJ, atau pertunjukan
                        khusus untuk menghibur tamu undangan Anda.</p>
                </div>

                <!-- Service 7 -->
                <div class="service-card bg-white rounded-lg shadow-md p-8 transition duration-300">
                    <div
                        class="bg-indigo-800 text-white rounded-full w-16 h-16 flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-star text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Etire (Full Event Package)</h3>
                    <p class="text-gray-600 text-center">Paket lengkap pengelolaan acara dari A-Z, memastikan setiap
                        detail terencana dan terekseskusi dengan sempurna.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-gray-50">
        <div class="container mx-auto px-16">
            <h2 class="text-3xl font-bold text-center mb-16">Karya Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Portfolio Item 1 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Wedding Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Pernikahan</h3>
                        <p class="text-center">Pernikahan mewah dengan tema klasik di Ballroom Hotel Grand Hyatt</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>

                <!-- Portfolio Item 2 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1541178735493-479c1a27ed24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80"
                        alt="Graduation Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Wisuda</h3>
                        <p class="text-center">Acara wisuda sekolah dengan tema futuristik di Convention Hall</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>

                <!-- Portfolio Item 3 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1602631985686-1bb0e6a8696e?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Birthday Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Ulang Tahun</h3>
                        <p class="text-center">Pesta ulang tahun ke-16 dengan tema enchanted garden</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>

                <!-- Portfolio Item 4 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Corporate Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Corporate Gathering</h3>
                        <p class="text-center">Annual meeting perusahaan dengan konsep modern elegan</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>

                <!-- Portfolio Item 5 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Wedding Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Pernikahan</h3>
                        <p class="text-center">Pernikahan outdoor dengan pemandangan sunset di pantai</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>

                <!-- Portfolio Item 6 -->
                <div class="portfolio-item relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="Concert Event" class="w-full h-64 object-cover">
                    <div
                        class="portfolio-overlay absolute inset-0 flex flex-col items-center justify-center text-white p-6">
                        <h3 class="text-xl font-bold mb-2">Konser Musik</h3>
                        <p class="text-center">Acara musik dengan tata panggung spektakuler dan lighting canggih</p>
                        <a href="#"
                            class="mt-4 border border-white px-4 py-2 rounded hover:bg-white hover:text-green-800 transition">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#"
                    class="bg-indigo-800 hover:bg-indigo-700 text-white px-8 py-3 rounded-md font-medium transition duration-300">Lihat
                    Lebih Banyak</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20">
        <div class="container mx-auto px-16">
            <h2 class="text-3xl font-bold text-center mb-16">Apa Kata Klien Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-white rounded-lg p-8">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Sarah Wijaya</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Momenta EO mengatur pernikahan kami dengan sempurna! Semua detail
                        diperhatikan, dari dekorasi hingga timeline acara. Kami benar-benar bisa menikmati hari istimewa
                        kami tanpa khawatir tentang apapun."</p>
                    <p class="mt-4 text-sm text-gray-500">Pernikahan, Mei 2023</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-white rounded-lg p-8">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Client"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Budi Santoso</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Acara gathering perusahaan kami berjalan sangat lancar berkat
                        Momenta EO. Mereka memahami kebutuhan kami dan memberikan solusi kreatif. Peserta sangat puas
                        dengan acara ini!"</p>
                    <p class="mt-4 text-sm text-gray-500">Corporate Gathering, Februari 2023</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-white rounded-lg p-8">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Dewi Lestari</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Pesta ulang tahun anak saya yang ke-10 menjadi sangat spesial
                        berkat Momenta EO. Dekorasinya indah, MC-nya menghibur, dan semua tamu senang. Terima kasih
                        telah mewujudkan impian anak saya!"</p>
                    <p class="mt-4 text-sm text-gray-500">Ulang Tahun, November 2022</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container mx-auto px-16">
            <h2 class="text-3xl font-bold text-center mb-16">Hubungi Kami</h2>
            <div class="flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2 lg:pr-10 mb-10 lg:mb-0">
                    <form class="bg-white p-8 rounded-lg shadow-md">
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-800">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-800">
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-800">
                        </div>
                        <div class="mb-6">
                            <label for="event-type" class="block text-gray-700 font-medium mb-2">Jenis Acara</label>
                            <select id="event-type"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-800">
                                <option value="">Pilih Jenis Acara</option>
                                <option value="wedding">Pernikahan</option>
                                <option value="graduation">Wisuda</option>
                                <option value="birthday">Ulang Tahun</option>
                                <option value="corporate">Corporate Event</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-800"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-indigo-800 hover:bg-indigo-700 text-white py-3 rounded-md font-medium transition duration-300">Kirim
                            Pesan</button>
                    </form>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-8 rounded-lg shadow-md h-full">
                        <h3 class="text-xl font-bold mb-6">Informasi Kontak</h3>
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Alamat</h4>
                            <p class="text-gray-600">Jl. Kemang Raya No. 12, Palembang 12730</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Telepon</h4>
                            <p class="text-gray-600">+62 812 3456 7890</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Email</h4>
                            <p class="text-gray-600">hello@CiptaAcara.com</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="font-medium mb-2">Jam Operasional</h4>
                            <p class="text-gray-600">Senin - Jumat: 09.00 - 17.00 WIB</p>
                            <p class="text-gray-600">Sabtu: 09.00 - 14.00 WIB</p>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">Sosial Media</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-indigo-800 hover:text-indigo-700 text-2xl"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="text-indigo-800 hover:text-indigo-700 text-2xl"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="#" class="text-indigo-800 hover:text-indigo-700 text-2xl"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="text-indigo-800 hover:text-indigo-700 text-2xl"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="mt-8">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81215631529484!3d-6.200741662247247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42d8b8b3c37%3A0x7f3cee1a1a05b6d0!2sJl.%20Kemang%20Raya%2C%20RT.5%2FRW.1%2C%20Bangka%2C%20Kec.%20Mampang%20Prpt.%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012730!5e0!3m2!1sen!2sid!4v1689688888888!5m2!1sen!2sid"
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/6281234567890"
        class="whatsapp-button bg-green-600 hover:bg-indigo-700 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-lg transition duration-300">
        <i class="fab fa-whatsapp text-3xl"></i>
    </a>

    <!-- Footer -->
    @include('partials.footer')

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Form submission
        const contactForm = document.querySelector('form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Terima kasih! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
                this.reset();
            });
        }
    </script>
</body>

</html>
