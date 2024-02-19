<h1 class="pt-5 text-center">Thống kê theo biểu đồ: <span id="text-date"></span></h1>
<select class="select-date">
    <option value="7ngay">7 ngày</option>
    <option value="30ngay">30 ngày</option>
    <option value="365ngay">365 ngày</option>
</select>
<div id="chart" style="height: 250px;"></div>


<script>
    $(document).ready(function () {
        thongke();
        var chart = new Morris.Area({
            element: "chart",
            xkey: "date",
            ykeys: ["date", "order", "sales", "quantity"],
            labels: ["Ngày", "Đơn hàng", "Doanh thu", "Số lượng"],
        });
        $('.select-date').change(function () {
            var timer = $(this).val();
            if (timer == "7ngay") {
                var text = "7 ngày";
            } else if (timer == "30ngay") {
                var text = "30 ngày";
            } else {
                var text = "365 ngày";
            }
            $.ajax({
                url: "thongke.php",
                method: "POST",
                dataType: "JSON",
                data: {timer: timer},
                success: function (data) {
                    chart.setData(data);
                    $("#text-date").text(text);
                }
            })
        })

        function thongke() {
            var text = "365 ngày";
            $.ajax({
                url: "thongke.php",
                // data: {act: "bieudo"},
                method: "POST",
                dataType: "JSON",

                success: function (data) {
                    chart.setData(data);
                    $("#text-date").text(text);
                }
            })
        }
    });
</script>

