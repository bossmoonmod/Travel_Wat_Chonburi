<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ท่องเที่ยววัด - Travel Wat Chonburi</title>
    <meta name="description" content="รวมสถานที่ท่องเที่ยววัดสวยในจังหวัดชลบุรี แนะนำวัดน่าเที่ยว แผนที่การเดินทาง และข้อมูลประวัติวัดต่างๆ สำหรับสายบุญและการท่องเที่ยวเชิงวัฒนธรรม">
    <meta name="keywords" content="วัดชลบุรี, เที่ยววัดชลบุรี, ไหว้พระชลบุรี, วัดสวยชลบุรี, แผนที่วัดชลบุรี, ท่องเที่ยวเชิงวัฒนธรรม, travel wat chonburi">
    <meta name="author" content="Travel Wat Chonburi">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://localhost/myproject/">
    <meta property="og:title" content="ท่องเที่ยววัด - Travel Wat Chonburi">
    <meta property="og:description" content="รวมสถานที่ท่องเที่ยววัดสวยในจังหวัดชลบุรี แนะนำวัดน่าเที่ยว แผนที่การเดินทาง และข้อมูลประวัติวัดต่างๆ">
    <meta property="og:image" content="http://localhost/myproject/assets/img/banner.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://localhost/myproject/">
    <meta property="twitter:title" content="ท่องเที่ยววัด - Travel Wat Chonburi">
    <meta property="twitter:description" content="รวมสถานที่ท่องเที่ยววัดสวยในจังหวัดชลบุรี แนะนำวัดน่าเที่ยว แผนที่การเดินทาง และข้อมูลประวัติวัดต่างๆ">
    <meta property="twitter:image" content="http://localhost/myproject/assets/img/banner.jpg">
    
    <!-- Geo Location Tags for Local SEO -->
    <meta name="geo.region" content="TH-20" />
    <meta name="geo.placename" content="Chon Buri" />
    <meta name="geo.position" content="13.361143;100.984673" />
    <meta name="ICBM" content="13.361143, 100.984673" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: {
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            200: '#eaddd7',
                            300: '#e0cec7',
                            400: '#d2bab0',
                            500: '#bfa094',
                            600: '#a18072',
                            700: '#977669',
                            800: '#846358',
                            900: '#43302b',
                        }
                    },
                    fontFamily: {
                        sans: ['Sarabun', 'sans-serif'],
                        serif: ['Noto Serif Thai', 'serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="text-stone-800 flex flex-col min-h-screen relative" style="background-image: url('assets/img/background.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">

    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md text-stone-800 shadow-sm border-b border-stone-100 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="index.php" class="text-2xl font-bold flex items-center gap-3 group">
                    <div class="flex flex-col">
                        <span class="text-brown-800 text-lg leading-tight uppercase tracking-wide font-serif">Chonburi</span>
                        <span class="text-stone-500 text-xs font-light tracking-widest">Travel Wat Chonburi</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php" class="px-4 py-2 rounded-full hover:bg-brown-50 hover:text-brown-700 transition font-medium">หน้าแรก</a>
                    <a href="wat1.php" class="px-4 py-2 rounded-full hover:bg-brown-50 hover:text-brown-700 transition font-medium">แนะนำวัด</a>
                    <a href="list.php" class="px-4 py-2 rounded-full hover:bg-brown-50 hover:text-brown-700 transition font-medium">รายชื่อวัด</a>
                    <a href="map.php" class="px-4 py-2 rounded-full hover:bg-brown-50 hover:text-brown-700 transition font-medium">แผนที่</a>
                    <a href="contact.php" class="ml-2 px-5 py-2 bg-brown-800 text-white rounded-full hover:bg-brown-900 transition shadow hover:shadow-lg font-medium">
                        ติดต่อเรา
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="menu-btn" class="focus:outline-none text-brown-800 p-2 hover:bg-brown-50 rounded-lg">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-lg">
            <div class="flex flex-col py-2">
                <a href="index.php" class="block py-3 px-6 hover:bg-brown-50 text-stone-700 hover:text-brown-800">หน้าแรก</a>
                <a href="wat1.php" class="block py-3 px-6 hover:bg-brown-50 text-stone-700 hover:text-brown-800">แนะนำวัด</a>
                <a href="list.php" class="block py-3 px-6 hover:bg-brown-50 text-stone-700 hover:text-brown-800">รายชื่อวัด</a>
                <a href="map.php" class="block py-3 px-6 hover:bg-brown-50 text-stone-700 hover:text-brown-800">แผนที่</a>
                <a href="contact.php" class="block py-3 px-6 hover:bg-brown-50 text-stone-700 hover:text-brown-800 border-t border-gray-50 mt-2 font-medium text-brown-700">ติดต่อเรา</a>
            </div>
        </div>
    </nav>
    
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if(menuBtn && mobileMenu){
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
    
    <!-- Main Content Wrapper -->
    <main class="flex-grow container mx-auto px-4 py-8 md:py-12">
