<footer>
        <div class="mid-footer">
            <div class="foot-left">
                <div class="foot-logo">
                    <a href="./index.php"><img src="./image/logo.png" style="width: 100%;"></a>
                </div>
                <div class="foot-content">
                    <i class="fa fa-map-marker-alt" ></i>
                    <p>Địa chỉ:  98 Dương Quảng Hàm, Cầu Giấy, TP.Hà Nội.</p>
                </div>
                <div class="foot-content">
                    <i class="fa fa-envelope" ></i>
                    Email:
                    <a style="color: black;">themanh20004@gmail.com</a>
                </div>
            </div>
            <div class="foot-center">
                <h3>Kết nối với khách hàng </h3>
                <ul>
                    <li><img src="./image/4bba40ed94dc7cfe1a59b4eb775a2b77.png" style="width: 10%;" alt="anh _yt"></li>
                    <li><img src="./image/—Pngtree—instagram logo icon_3588821.png" style="width: 10%;" alt="anh_ig">
                    </li>
                    <li><img src="./image/twitter.png" style="width: 10%;" alt="anh_ig"></li>
                </ul>
            </div>
            <div class="foot-right">
                <h3>Tải ứng dụng trên điện thoại</h3>
                <ul>
                    <li><img src="./image/google-store.png" style="width: 50%;" alt=""></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="./js/script.js"></script>
    <script src="./account/index.php"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy dữ liệu từ PHP
        var totalChapters = <?php echo $totalChapters; ?>;
        var totalLessons = <?php echo $totalLessons; ?>;

        var ctx = document.getElementById('libraryChart').getContext('2d');
        var libraryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tổng số bài học', 'Tổng số lessons'],
                datasets: [{
                    label: 'Thống kê Bài học và Lessons',
                    data: [totalChapters, totalLessons],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 300 // Điều chỉnh theo nhu cầu của bạn
                    }
                }
            }
        });
    });
</script>
</body>
</html>