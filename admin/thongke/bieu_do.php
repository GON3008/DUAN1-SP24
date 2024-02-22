<h1 class="pt-5 text-center">Thống kê theo biểu đồ: <span id="text-date"></span></h1>
<div>
    <select class="select-date">
        <option value="7ngay">7 ngày qua</option>
        <option value="28ngay">28 ngày qua</option>
        <option value="90ngay">90 ngày qua</option>
        <option value="365ngay">365 ngày qua</option>
    </select>
</div>
<div id="chart" style="height: 250px;"></div>


<script>
    $(document).ready(function () {
        thongke();
        var chart = new Morris.Area({
            element: "chart",
            xkey: "date",
            ykeys: ["date","total"],
            labels: ["Ngày","Tổng"],
        });
        $('.select-date').change(function () {
            var thoigian = $(this).val();
            if (thoigian == '7ngay') {
                var text = "7 ngày qua";
            } else if (thoigian == '28ngay') {
                var text = "28 ngày qua";
            } else if (thoigian == '90ngay') {
                var text = "90 ngày qua";
            } else {
                var text = "365 ngày qua";
            }
            $.ajax({
                url: "thongke.php",
                method: "POST",
                dataType: "JSON",
                data: {thoigian: thoigian},
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

