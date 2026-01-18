<?php 
include 'includes/header.php';
include 'includes/db.php';

// Load temples data from DB
$temples = getTemples($conn);
?>

<!-- Hero Section -->
<section class="rounded-3xl py-24 px-6 md:px-12 mb-16 text-center shadow-2xl relative overflow-hidden bg-cover bg-center group" style="background-image: url('assets/img/banner.jpg'); min-height: 500px; display: flex; align-items: center; justify-content: center;">
    <!-- Overlay with gradient -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-stone-900/60 via-stone-800/40 to-stone-900/80 z-0 transition duration-700 group-hover:via-stone-800/20"></div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <span class="inline-block py-1 px-3 rounded-full bg-brown-500/80 text-white text-sm font-medium tracking-wider mb-6 backdrop-blur-sm border border-white/20 uppercase">Chonburi, Thailand</span>
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-xl font-serif tracking-tight">
            เสน่ห์แห่งศรัทธา <br> <span class="text-brown-200">วัดงามชลบุรี</span>
        </h1>
        <p class="text-xl md:text-2xl text-stone-200 mb-10 font-light leading-relaxed max-w-2xl mx-auto drop-shadow-md">
            ค้นพบความสงบทางจิตใจ และสถาปัตยกรรมอันล้ำค่า <br class="hidden md:inline">ผ่านเส้นทางบุญที่เราคัดสรรมาเพื่อคุณ
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="wat1.php" class="bg-white text-brown-900 px-8 py-4 rounded-full font-bold hover:bg-brown-50 transition shadow-lg hover:shadow-xl hover:-translate-y-1 text-lg">
                เข้าชมวัดทั้งหมด
            </a>
            <a href="map.php" class="bg-brown-600/90 backdrop-blur-md text-white px-8 py-4 rounded-full font-medium hover:bg-brown-600 transition shadow-lg hover:shadow-xl hover:-translate-y-1 text-lg border border-white/10">
                ดูแผนที่เดินทาง
            </a>
        </div>
    </div>
</section>

<!-- Stats / Highlights -->
<section class="mb-20 container mx-auto px-4 relative -mt-24 z-20">
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10 border border-stone-100 grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-stone-100">
        <div class="py-2">
            <div class="text-4xl font-serif font-bold text-brown-600 mb-2">9+</div>
            <div class="text-stone-500 font-medium">วัดสวยแนะนำ</div>
        </div>
        <div class="py-2">
            <div class="text-4xl font-serif font-bold text-brown-600 mb-2">100%</div>
            <div class="text-stone-500 font-medium">คุ้มค่าแก่การไปเยือน</div>
        </div>
        <div class="py-2">
            <div class="text-4xl font-serif font-bold text-brown-600 mb-2">3</div>
            <div class="text-stone-500 font-medium">โซนท่องเที่ยวหลัก</div>
        </div>
    </div>
</section>

<!-- Featured Section Categories -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-stone-800 mb-4 font-serif">เริ่มต้นการเดินทาง</h2>
        <p class="text-stone-500 max-w-xl mx-auto text-lg font-light">เลือกหมวดหมู่ข้อมูลที่คุณสนใจ เพื่อวางแผนการท่องเที่ยวให้สมบูรณ์แบบ</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <a href="wat1.php" class="group relative rounded-2xl overflow-hidden shadow-lg h-72">
            <img src="assets/img/วัดญาณสังวราราม วรมหาวิหาร.jpg" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="ข้อมูลวัด">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                <span class="text-brown-300 text-sm font-bold uppercase tracking-widest mb-1">Architecture</span>
                <h3 class="text-white text-xl font-bold font-serif group-hover:text-brown-200 transition">ข้อมูลวัด</h3>
            </div>
        </a>

        <a href="map.php" class="group relative rounded-2xl overflow-hidden shadow-lg h-72">
            <img src="assets/img/วัดพระใหญ่.jpg" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="แผนที่">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                <span class="text-brown-300 text-sm font-bold uppercase tracking-widest mb-1">Navigation</span>
                <h3 class="text-white text-xl font-bold font-serif group-hover:text-brown-200 transition">แผนที่</h3>
            </div>
        </a>

        <a href="list.php" class="group relative rounded-2xl overflow-hidden shadow-lg h-72">
            <img src="assets/img/วัดแสนสุขสุทธิวราราม.jpg" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="รายชื่อวัด">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
                <span class="text-brown-300 text-sm font-bold uppercase tracking-widest mb-1">Directory</span>
                <h3 class="text-white text-xl font-bold font-serif group-hover:text-brown-200 transition">รายชื่อวัด</h3>
            </div>
        </a>

        <a href="contact.php" class="group relative rounded-2xl overflow-hidden shadow-lg h-72">
            <div class="w-full h-full bg-brown-800 flex items-center justify-center transition duration-700 group-hover:bg-brown-900">
                 <svg class="w-16 h-16 text-brown-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col justify-end p-6">
                <span class="text-brown-300 text-sm font-bold uppercase tracking-widest mb-1">Get in Touch</span>
                <h3 class="text-white text-xl font-bold font-serif group-hover:text-brown-200 transition">ติดต่อเรา</h3>
            </div>
        </a>

    </div>
</section>

<!-- Highlight Article with modern layout -->
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Highlight Article Slider (Must Visit) -->
<section class="mb-12 bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-stone-100 relative overflow-hidden">
    
    <div class="swiper mySwiper w-full">
        <div class="swiper-wrapper">
            <?php 
            // Shuffle temples to show random suggestions
            $slider_temples = $temples;
            shuffle($slider_temples);
            $slider_temples = array_slice($slider_temples, 0, 5); // Show 5 random temples
            
            foreach ($slider_temples as $item): 
            ?>
            <div class="swiper-slide">
                <div class="flex flex-col md:flex-row gap-10 items-center">
                    <div class="md:w-1/2 w-full">
                        <div class="h-[400px] w-full overflow-hidden rounded-2xl shadow-lg relative group">
                            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition duration-500"></div>
                        </div>
                    </div>
                    <div class="md:w-1/2 w-full text-left">
                        <span class="text-brown-600 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Must Visit</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-stone-800 mb-6 font-serif leading-tight">
                            สถานแนะนำ <br> <span class="text-brown-600"><?php echo $item['name']; ?></span>
                        </h2>
                        <p class="text-stone-600 text-lg leading-relaxed mb-8 font-light line-clamp-3">
                            <?php echo $item['description']; ?>...
                        </p>
                        <a href="wat1.php#temple-<?php echo $item['id']; ?>" class="inline-flex items-center text-brown-800 font-bold hover:text-brown-600 transition group text-lg">
                            อ่านเพิ่มเติม 
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination/Navigation -->
        <div class="swiper-pagination !bottom-0 pt-4"></div>
        <div class="hidden md:block swiper-button-next !text-brown-600 after:!text-2xl"></div>
        <div class="hidden md:block swiper-button-prev !text-brown-600 after:!text-2xl"></div>
    </div>

</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        fadeEffect: {
            crossFade: true
        },
    });
</script>

<?php include 'includes/footer.php'; ?>
