<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;
include "../model/pdo.php";
require "carbon/autoload.php";

$dburl = "mysql:host=localhost;dbname=du_an_1;charset=utf8";
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dburl, $username, $password);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['timer'])){
        $timer = $_POST['timer'];
    }else{
        $timer = "";
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    if ($timer == '7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    }elseif ($timer == '30ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
    }elseif ($timer == '365ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM thongke WHERE ngaydat BETWEEN :subdays AND :now ORDER BY ngaydat ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':subdays', $subdays, PDO::PARAM_STR);
    $stmt->bindParam(':now', $now, PDO::PARAM_STR);
    $stmt->execute();

    $chart_data = [];
    while ($val = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' => $val['donhang'],
            'sales' => $val['doanhthu'],
            'quantity' => $val['soluong']
        );
    }
    echo $data = json_encode($chart_data);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    // Log the error or handle it more gracefully in a production environment
}