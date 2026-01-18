<?php 
    include 'includes/header.php'; 
    include 'includes/db.php';
    
    // Check for search query
    $search_query = isset($_GET['q']) ? $_GET['q'] : '';
    $temples = getTemples($conn, $search_query);
?>

<section>
    <div class="text-center mb-10 pt-10">
        <span class="text-brown-600 font-bold tracking-widest uppercase text-sm mb-2 block">Destinations</span>
        <h1 class="text-4xl md:text-5xl font-bold text-stone-800 font-serif">แนะนำสถานที่ท่องเที่ยววัด</h1>
        <div class="h-1 w-20 bg-brown-500 mx-auto mt-6 rounded-full"></div>
        <p class="text-stone-500 mt-6 max-w-2xl mx-auto text-lg font-light">รวมวัดสวยและน่าศรัทธาในจังหวัดชลบุรี ที่คัดสรรมาเพื่อการท่องเที่ยวเชิงวัฒนธรรม</p>
    </div>

    <!-- Search Box -->
    <div class="max-w-xl mx-auto mb-16 relative px-4">
        <form action="" method="GET" class="relative">
            <input type="text" 
                   name="q" 
                   value="<?php echo htmlspecialchars($search_query); ?>"
                   placeholder="ค้นหาชื่อวัด หรือ สถานที่..." 
                   class="w-full pl-6 pr-14 py-4 rounded-full bg-white border border-stone-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-brown-400 focus:border-transparent transition text-stone-700 placeholder-stone-400">
            <button type="submit" class="absolute right-2 top-2 h-10 w-10 bg-brown-600 rounded-full flex items-center justify-center text-white hover:bg-brown-800 transition shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </form>
    </div>


    <!-- Masonry-like Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php if (!empty($temples)): ?>
            <?php foreach ($temples as $temple): ?>
                
                <article id="temple-<?php echo $temple['id']; ?>" class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-500 overflow-hidden border border-stone-100 flex flex-col scroll-mt-32">
                    <!-- Image Wrapper -->
                    <div class="h-64 overflow-hidden relative">
                        <img src="<?php echo $temple['image']; ?>" 
                             alt="<?php echo $temple['name']; ?>" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        
                        <!-- Overlay on hover -->
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition duration-500"></div>

                        <!-- Badge -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-brown-800 shadow-sm uppercase tracking-wide">
                            Chonburi
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold text-stone-800 mb-3 font-serif group-hover:text-brown-700 transition"><?php echo $temple['name']; ?></h2>
                            <p class="text-sm text-brown-600 mb-4 flex items-center font-medium">
                                <span class="mr-2">📍</span> <?php echo $temple['address']; ?>
                            </p>
                            <p class="text-stone-500 leading-relaxed font-light">
                                <?php echo $temple['description']; ?>
                            </p>
                        </div>
                        
                        <!-- Actions -->
                        <div class="mt-auto pt-6 border-t border-stone-100 flex justify-between items-center">
                            <span class="text-xs text-stone-400 font-light">แนะนำโดยเรา</span>
                            <a href="map.php#temple-<?php echo $temple['id']; ?>" class="inline-flex items-center text-brown-700 font-semibold hover:text-brown-900 transition">
                                ดูแผนที่
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full text-center py-20 text-stone-400 font-light text-xl">
                -- ยังไม่มีข้อมูลวัดในขณะนี้ --
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
