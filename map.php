<?php 
    include 'includes/header.php'; 
    include 'includes/db.php';
    $temples = getTemples($conn);
?>

<!-- Main Layout: Full height minus header/footer approximations -->
<div class="flex flex-col md:flex-row h-[calc(100vh-80px)] bg-stone-50 overflow-hidden">
    
    <!-- Sidebar (Temple List) -->
    <aside class="w-full md:w-1/3 lg:w-1/4 bg-white border-r border-stone-200 flex flex-col z-20 shadow-xl">
        <div class="p-6 border-b border-stone-100 bg-white">
            <h1 class="text-2xl font-bold text-brown-800 font-serif">แผนที่วัด</h1>
            <p class="text-stone-500 text-sm mt-1">เลือกวัดที่ต้องการดูตำแหน่ง</p>
        </div>
        
        <!-- Scrollable List -->
        <div class="flex-1 overflow-y-auto overflow-x-hidden p-4 space-y-3 custom-scrollbar">
            <?php foreach ($temples as $index => $temple): ?>
                <button 
                    onclick="changeMap('<?php echo $temple['name']; ?>', this)"
                    class="temple-item w-full text-left p-4 rounded-xl transition duration-200 border border-transparent hover:bg-stone-50 hover:border-stone-200 group <?php echo $index === 0 ? 'bg-brown-50 border-brown-200 active-temple' : 'bg-white'; ?>"
                    data-name="<?php echo $temple['name']; ?>"
                >
                    <div class="flex items-start gap-3">
                        <div class="bg-brown-100 text-brown-700 w-8 h-8 rounded-full flex items-center justify-center shrink-0 font-bold text-sm group-hover:bg-brown-600 group-hover:text-white transition">
                            <?php echo $index + 1; ?>
                        </div>
                        <div>
                            <h3 class="font-bold text-stone-800 group-hover:text-brown-700 transition font-serif leading-tight">
                                <?php echo $temple['name']; ?>
                            </h3>
                            <p class="text-xs text-stone-500 mt-1 line-clamp-1 font-light">
                                <?php echo $temple['address']; ?>
                            </p>
                        </div>
                    </div>
                </button>
            <?php endforeach; ?>
        </div>
    </aside>

    <!-- Map Area -->
    <main class="flex-1 relative bg-stone-100 h-[50vh] md:h-auto">
        <!-- Loading State (Optional visual polish) -->
        <div class="absolute inset-0 flex items-center justify-center text-stone-400 z-0">
            <span class="animate-pulse">กำลังโหลดแผนที่...</span>
        </div>

        <!-- Google Maps Iframe -->
        <?php 
            // Default to the first temple
            $first_temple_name = !empty($temples) ? $temples[0]['name'] : 'Chonburi';
        ?>
        <iframe 
            id="main-map"
            class="w-full h-full relative z-10"
            frameborder="0" 
            style="border:0" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            src="https://maps.google.com/maps?q=<?php echo urlencode($first_temple_name . ' ชลบุรี'); ?>&t=&z=15&ie=UTF8&iwloc=&output=embed">
        </iframe>
        
        <!-- Legend / Info Floating (Optional) -->
        <div class="absolute bottom-6 left-6 z-20 bg-white/90 backdrop-blur px-4 py-2 rounded-lg shadow-lg text-xs text-stone-500 border border-stone-200 hidden md:block">
            * คลิกที่รายชื่อด้านซ้ายเพื่อเปลี่ยนตำแหน่ง map
        </div>
    </main>

</div>

<script>
    function changeMap(templeName, element) {
        // 1. Update Map Source
        const mapFrame = document.getElementById('main-map');
        const encodedName = encodeURIComponent(templeName + ' ชลบุรี');
        const newSrc = `https://maps.google.com/maps?q=${encodedName}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
        
        // Prevent reloading if clicking the same one (optional optimization)
        if(mapFrame.src !== newSrc) {
            mapFrame.src = newSrc;
        }

        // 2. Update Active State in Sidebar
        // Remove active class from all
        document.querySelectorAll('.temple-item').forEach(el => {
            el.classList.remove('bg-brown-50', 'border-brown-200', 'active-temple');
            el.classList.add('bg-white');
            
            // Reset number badge style
            const badge = el.querySelector('div.w-8');
            badge.classList.remove('bg-brown-600', 'text-white');
            badge.classList.add('bg-brown-100', 'text-brown-700');
        });

        // Add active class to clicked element
        element.classList.remove('bg-white');
        element.classList.add('bg-brown-50', 'border-brown-200', 'active-temple');
        
        // Highlight number badge
        const activeBadge = element.querySelector('div.w-8');
        activeBadge.classList.remove('bg-brown-100', 'text-brown-700');
        activeBadge.classList.add('bg-brown-600', 'text-white');
    }
</script>

<style>
    /* Ensure the footer is hidden or handled differently for this specific "App-like" page layout if desired, 
       but since we include header.php which starts body, we might need to hide the footer 
       or just let it be at the bottom if the user scrolls the whole page. 
       However, the h-[calc(100vh-80px)] tries to fit it in one screen. 
       Let's hide the global footer for this page to keep it clean app-style.
    */
    footer {
        display: none;
    }
    
    /* Custom Scrollbar for the list */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #e7e5e4;
        border-radius: 20px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #a8a29e;
    }
</style>

<!-- Note: Footer is deliberately hidden by CSS in this file to create a full-screen map experience -->
</body>
</html>
