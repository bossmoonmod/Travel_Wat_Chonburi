<?php 
    include 'includes/header.php'; 
    include 'includes/db.php';
    
    // 1. Setup Pagination & Search Variables
    $search_query = isset($_GET['q']) ? $_GET['q'] : '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    
    $limit = 10; // Items per page
    $offset = ($page - 1) * $limit;
    
    // 2. Fetch Data
    $temples = getTemples($conn, $search_query, $limit, $offset);
    $total_temples = getTemplesCount($conn, $search_query);
    $total_pages = ceil($total_temples / $limit);
?>

<section class="max-w-5xl mx-auto min-h-[60vh]">
    <div class="text-center mb-10 pt-10">
        <span class="text-brown-600 font-bold tracking-widest uppercase text-sm mb-2 block">Directory</span>
        <h1 class="text-3xl md:text-4xl font-bold text-stone-800 font-serif">รายชื่อวัดทั้งหมด</h1>
        <div class="h-1 w-20 bg-brown-500 mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Search Box -->
    <div class="max-w-xl mx-auto mb-12 relative px-4">
        <form action="" method="GET" class="relative">
            <input type="text" 
                   name="q" 
                   value="<?php echo htmlspecialchars($search_query); ?>"
                   placeholder="ค้นหาชื่อวัด หรือ ที่อยู่..." 
                   class="w-full pl-6 pr-14 py-4 rounded-full bg-white border border-stone-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-brown-400 focus:border-transparent transition text-stone-700 placeholder-stone-400">
            <button type="submit" class="absolute right-2 top-2 h-10 w-10 bg-brown-600 rounded-full flex items-center justify-center text-white hover:bg-brown-800 transition shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </form>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-stone-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-stone-600">
                <thead class="bg-stone-50 border-b border-stone-100 text-xs uppercase text-stone-500 font-bold tracking-wider">
                    <tr>
                        <th class="px-8 py-6 font-serif text-brown-800">ชื่อวัด</th>
                        <th class="px-8 py-6 font-serif text-brown-800">ที่อยู่</th>
                        <th class="px-8 py-6 text-center font-serif text-brown-800">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    <?php if (!empty($temples)): ?>
                        <?php foreach ($temples as $temple): ?>
                        <tr class="hover:bg-brown-50/50 transition duration-300 group">
                            <td class="px-8 py-6">
                                <span class="font-bold text-stone-800 text-lg group-hover:text-brown-700 transition font-serif block"><?php echo $temple['name']; ?></span>
                            </td>
                            <td class="px-8 py-6 font-light">
                                <?php echo $temple['address']; ?>
                            </td>
                            <td class="px-8 py-6 text-center space-x-2">
                                <a href="map.php#temple-<?php echo $temple['id']; ?>" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-stone-100 text-brown-600 hover:bg-brown-600 hover:text-white transition shadow-sm" title="ดูแผนที่">
                                    🗺️
                                </a>
                                <a href="wat1.php#temple-<?php echo $temple['id']; ?>" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-stone-100 text-stone-600 hover:bg-stone-600 hover:text-white transition shadow-sm" title="ดูรายละเอียด">
                                    ℹ️
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-stone-400 font-light">ไม่มีข้อมูล</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Controls -->
    <?php if ($total_pages > 1): ?>
    <div class="mt-8 flex justify-center items-center space-x-2">
        <!-- Previous Page -->
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>&q=<?php echo urlencode($search_query); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-stone-200 text-stone-600 hover:bg-brown-600 hover:text-white hover:border-brown-600 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        <?php endif; ?>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&q=<?php echo urlencode($search_query); ?>" 
               class="w-10 h-10 flex items-center justify-center rounded-full border transition font-medium <?php echo $i === $page ? 'bg-brown-600 border-brown-600 text-white shadow-md' : 'bg-white border-stone-200 text-stone-600 hover:bg-brown-50 hover:text-brown-700'; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <!-- Next Page -->
        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>&q=<?php echo urlencode($search_query); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-stone-200 text-stone-600 hover:bg-brown-600 hover:text-white hover:border-brown-600 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="mt-4 text-center text-xs text-stone-400 font-light">
        แสดง <?php echo count($temples); ?> รายการ จากทั้งหมด <?php echo $total_temples; ?> รายการ
    </div>

</section>

<?php include 'includes/footer.php'; ?>
