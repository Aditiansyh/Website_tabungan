<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Tabungan - Kelola Keuangan dengan Elegan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            '50': '#f0f5ff',
                            '100': '#e0eaff',
                            '200': '#c7d6fe',
                            '300': '#a5b4fc',
                            '400': '#818cf8',
                            '500': '#6366f1',
                            '600': '#4f46e5',
                            '700': '#4338ca',
                            '800': '#3730a3',
                            '900': '#1E3A8A',
                        },
                        'secondary': '#1E40AF',
                        'accent': '#3B82F6',
                        'dark': '#111827',
                        'light': '#F9FAFB',
                        'success': '#10B981',
                        'warning': '#F59E0B',
                        'error': '#EF4444'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.08)',
                        'hard': '0 4px 12px -2px rgba(0, 0, 0, 0.15)',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --color-primary-50: #f0f5ff;
            --color-primary-900: #1E3A8A;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8FAFC;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .nav-gradient {
            background: linear-gradient(135deg, var(--color-primary-900) 0%, #1E40AF 100%);
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .mobile-menu.open {
            max-height: 500px;
            transition: max-height 0.3s ease-in;
        }

        .hamburger-top,
        .hamburger-middle,
        .hamburger-bottom {
            transform-origin: center;
            transition: all 0.3s ease;
        }

        .hamburger-active .hamburger-top {
            transform: translateY(6px) rotate(45deg);
        }

        .hamburger-active .hamburger-middle {
            opacity: 0;
        }

        .hamburger-active .hamburger-bottom {
            transform: translateY(-6px) rotate(-45deg);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="nav-gradient shadow-lg px-4 sm:px-6 py-3 sticky top-0 z-50" x-data="{ mobileMenuOpen: false, profileDropdownOpen: false }">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-2xl font-bold text-white">
                    Rencana<span class="font-light">Tabungan</span>
                </h1>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                @auth
                    <a href="/home" class="text-blue-100 hover:text-white transition flex items-center group">
                        <i class="fas fa-home mr-2 group-hover:scale-110 transition-transform"></i>
                        <span class="group-hover:font-medium">Home</span>
                    </a>
                    <a href="/tabungan" class="text-blue-100 hover:text-white transition flex items-center group">
                        <i class="fas fa-piggy-bank mr-2 group-hover:scale-110 transition-transform"></i>
                        <span class="group-hover:font-medium">Daftar Tabungan</span>
                    </a>
                    <a href="{{ route('menabung.form') }}" class="text-blue-100 hover:text-white flex items-center group">
                        <i class="fas fa-plus-circle mr-2 group-hover:scale-110 transition-transform"></i>
                        <span class="group-hover:font-medium">Menabung</span>
                    </a>
                    <div class="relative">
                        <!-- Dropdown toggle button -->
                        <button @click="profileDropdownOpen = !profileDropdownOpen" 
                                @keydown.escape="profileDropdownOpen = false" 
                                class="flex items-center space-x-1 focus:outline-none group" 
                                :aria-expanded="profileDropdownOpen"
                                aria-haspopup="true">
                            <div
                                class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white font-semibold group-hover:bg-opacity-30 transition">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <i class="fas fa-chevron-down text-xs text-blue-100 transition-transform duration-200"
                                :class="{ 'transform rotate-180': profileDropdownOpen }"></i>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="profileDropdownOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200 focus:outline-none"
                             role="menu" 
                             aria-orientation="vertical" 
                             aria-labelledby="user-menu-button" 
                             tabindex="-1">
                            <a href="{{ route('profile') }}"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 flex items-center"
                                role="menuitem" 
                                tabindex="-1" 
                                @click="profileDropdownOpen = false">
                                <i class="fas fa-user-circle mr-2 text-primary-600"></i> Profil
                            </a>
                            <a href="/logout" 
                               class="px-4 py-2 text-sm text-error hover:bg-gray-50 flex items-center"
                               role="menuitem" 
                               tabindex="-1" 
                               @click="profileDropdownOpen = false">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('preview') }}"
                        class="text-white hover:underline hover:text-blue-100 transition">Beranda</a>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                @auth
                    <div class="relative mr-4">
                        <button @click="profileDropdownOpen = !profileDropdownOpen" 
                                @click.outside="profileDropdownOpen = false"
                                class="flex items-center space-x-1 focus:outline-none">
                            <div
                                class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <i class="fas fa-chevron-down text-xs text-blue-100 ml-1 transition-transform duration-200"
                                :class="{ 'transform rotate-180': profileDropdownOpen }"></i>
                        </button>

                        <div x-show="profileDropdownOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200 focus:outline-none">
                            <a href="{{ route('profile') }}"
                                class="px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 flex items-center"
                                @click="profileDropdownOpen = false">
                                <i class="fas fa-user-circle mr-2 text-primary-600"></i> Profil
                            </a>
                            <a href="/logout" 
                               class="px-4 py-2 text-sm text-error hover:bg-gray-50 flex items-center"
                               @click="profileDropdownOpen = false">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                @endauth

                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="text-white focus:outline-none">
                    <div class="hamburger space-y-1.5" :class="{ 'hamburger-active': mobileMenuOpen }">
                        <span class="hamburger-top block w-6 h-0.5 bg-white rounded"></span>
                        <span class="hamburger-middle block w-6 h-0.5 bg-white rounded"></span>
                        <span class="hamburger-bottom block w-6 h-0.5 bg-white rounded"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-menu md:hidden bg-primary-800" :class="{ 'open': mobileMenuOpen }">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                @auth
                    <a href="/home"
                        class="text-white hover:bg-primary-700 px-3 py-2 rounded-md text-base font-medium flex items-center"
                        @click="mobileMenuOpen = false">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="/tabungan"
                        class="text-white hover:bg-primary-700 px-3 py-2 rounded-md text-base font-medium flex items-center"
                        @click="mobileMenuOpen = false">
                        <i class="fas fa-piggy-bank mr-2"></i> Daftar Tabungan
                    </a>
                    <a href="{{ route('menabung.form') }}"
                        class="text-white hover:bg-primary-700 px-3 py-2 rounded-md text-base font-medium flex items-center"
                        @click="mobileMenuOpen = false">
                        <i class="fas fa-plus-circle mr-2"></i> Menabung
                    </a>
                @endauth
                @guest
                    <a href="{{ route('preview') }}"
                        class="text-white hover:bg-primary-700 px-3 py-2 rounded-md text-base font-medium"
                        @click="mobileMenuOpen = false">
                        Beranda
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow container mx-auto px-4 sm:px-6 py-8 max-w-7xl">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-lg font-semibold text-dark">RencanaTabungan</span>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">Membantu Anda mencapai tujuan finansial dengan
                        perencanaan yang tepat dan pengelolaan keuangan yang cerdas.</p>
                </div>
                <div>
                    <h3 class="text-dark font-medium mb-4 text-lg">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> Beranda</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> Tabungan</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-dark font-medium mb-4 text-lg">Bantuan</h3>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> FAQ</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> Kontak</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-primary-600 transition flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i> Panduan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-dark font-medium mb-4 text-lg">Hubungi Kami</h3>
                    <div class="flex space-x-4 mb-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition transform hover:-translate-y-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition transform hover:-translate-y-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition transform hover:-translate-y-1">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-primary-600 hover:bg-primary-600 hover:text-white transition transform hover:-translate-y-1">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-600 text-sm flex items-center">
                            <i class="fas fa-envelope mr-2 text-primary-400"></i> info@rencanatabungan.com
                        </p>
                        <p class="text-gray-600 text-sm flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-primary-400"></i> +62 123 4567 8910
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm text-center md:text-left mb-4 md:mb-0">
                    &copy; {{ date('Y') }} RencanaTabungan. All rights reserved.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-primary-600 hover:underline text-sm">Privacy Policy</a>
                    <a href="#" class="text-primary-600 hover:underline text-sm">Terms of Service</a>
                    <a href="#" class="text-primary-600 hover:underline text-sm">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburger = document.querySelector('.hamburger');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            hamburger.classList.toggle('hamburger-active');

            // Toggle aria-expanded attribute
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                hamburger.classList.remove('hamburger-active');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

</body>

</html>
