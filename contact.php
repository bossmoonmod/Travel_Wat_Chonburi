<?php include 'includes/header.php'; ?>

<?php 
include 'includes/db.php';

$statusMsg = '';
$statusType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert into DB
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        $statusType = 'success';
        $statusMsg = "ขอบคุณที่ติดต่อเรา! เราได้รับข้อความของคุณเรียบร้อยแล้ว";
    } else {
        $statusType = 'error';
        $statusMsg = "เกิดข้อผิดพลาด: " . $conn->error;
    }
}
?>

<section class="max-w-6xl mx-auto px-4 py-12 md:py-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-stretch">
        
        <!-- Info Column -->
        <div class="flex flex-col justify-center">
            <span class="text-brown-600 font-bold tracking-widest uppercase text-sm mb-4 block">Get in Touch</span>
            <h1 class="text-4xl md:text-5xl font-bold text-stone-800 font-serif mb-6 leading-tight">
                มีคำถามหรือข้อเสนอแนะ? <br>
                <span class="text-brown-700">ส่งข้อความหาเราได้เลย</span>
            </h1>
            <p class="text-stone-500 text-lg font-light mb-10 leading-relaxed">
                เรายินดีรับฟังทุกความคิดเห็น เพื่อนำมาปรับปรุงและพัฒนาเว็บไซต์ "เที่ยววัดชลบุรี" ให้ดียิ่งขึ้น 
                หรือหากต้องการแนะนำวัดสวยๆ เพิ่มเติม ก็สามารถแจ้งมาได้เช่นกัน
            </p>

            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-white border border-stone-100 shadow-sm flex items-center justify-center text-brown-600 text-xl shrink-0">📍</div>
                    <div>
                        <h4 class="font-bold text-stone-800 font-serif">ที่อยู่</h4>
                        <p class="text-stone-500 font-light">มหาวิทยาลัยเทคโนโลยีศรีราขา <br>สาขาวิชา เทคโนโลยีสารสนเทศ</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-white border border-stone-100 shadow-sm flex items-center justify-center text-brown-600 text-xl shrink-0">📧</div>
                    <div>
                        <h4 class="font-bold text-stone-800 font-serif">อีเมล</h4>
                        <p class="text-stone-500 font-light">contact@example.com</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-white border border-stone-100 shadow-sm flex items-center justify-center text-brown-600 text-xl shrink-0">🕒</div>
                    <div>
                        <h4 class="font-bold text-stone-800 font-serif">เวลาทำการ</h4>
                        <p class="text-stone-500 font-light">จันทร์ - ศุกร์: 9.00 - 17.00 น.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-stone-100 relative">
            <?php if (!empty($statusMsg)): ?>
                <div class="mb-6 p-4 rounded-xl <?php echo $statusType == 'success' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200'; ?> flex items-center gap-3 animate-bounce-in">
                    <span class="text-2xl"><?php echo $statusType == 'success' ? '✅' : '❌'; ?></span>
                    <p class="font-medium"><?php echo $statusMsg; ?></p>
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="name" class="block text-sm font-bold text-stone-700 mb-2 font-serif">ชื่อ-นามสกุล</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-brown-400 focus:bg-white outline-none transition duration-300 placeholder-stone-400 group-hover:border-brown-200" placeholder="ระบุชื่อของคุณ">
                    </div>

                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-stone-700 mb-2 font-serif">อีเมลติดต่อ</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-brown-400 focus:bg-white outline-none transition duration-300 placeholder-stone-400 group-hover:border-brown-200" placeholder="example@email.com">
                    </div>
                </div>

                <div class="group">
                    <label for="message" class="block text-sm font-bold text-stone-700 mb-2 font-serif">ข้อความ</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-brown-400 focus:bg-white outline-none transition duration-300 placeholder-stone-400 group-hover:border-brown-200" placeholder="พิมพ์ข้อความของคุณ..."></textarea>
                </div>

                <button type="submit" 
                    class="w-full bg-brown-800 text-white font-bold py-4 rounded-xl hover:bg-brown-900 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 tracking-wide uppercase flex items-center justify-center gap-2 group">
                    <span>ส่งข้อความ</span>
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
