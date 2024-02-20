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
    if(isset($_POST['thoigian'])){
        $thoigian = $_POST['thoigian'];
    }else{
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    if ($thoigian == '7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    }elseif ($thoigian == '28ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    }elseif ($thoigian == '90ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
    }elseif ($thoigian == '365ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM bill WHERE ngaydathang BETWEEN :subdays AND :now ORDER BY ngaydathang ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':subdays', $subdays, PDO::PARAM_STR);
    $stmt->bindParam(':now', $now, PDO::PARAM_STR);
    $stmt->execute();

    $chart_data = [];
    while ($val = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $chart_data[] = array(
            'total' => $val['tongtien_bill'],
            'date' => $val['ngaydathang'],
//            'order' => $val['name_bill'],
//            'sales' => $val['tongtien_bill'],
//            'quantity' => $val['pttt_bill']
        );
    }
    echo $data = json_encode($chart_data);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    // Log the error or handle it more gracefully in a production environment
}