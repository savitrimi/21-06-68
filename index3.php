<?php
include("connect.php");
$sql = "SELECT ord.orderNumber AS order_number,
               od.productCode AS product_code,
               p.productName AS product_name,
               ord.orderDate AS order_Date,
               ord.shippedDate AS shipped_Date,
               ord.status AS status
        FROM orders ord
        JOIN orderdetails od ON ord.orderNumber = od.orderNumber
        JOIN products p ON od.productCode = p.productCode
        WHERE p.productLine = 'Classic Cars'
        AND ord.status = 'Shipped'
        AND ord.orderDate BETWEEN '2003-01-01' AND '2004-12-31'
        ORDER BY ord.orderDate, ord.orderNumber;";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จำนวนสั่งสินค้าในหมวด Classic Cars ระหว่างปี 2003-2004(เงื่อนไขที่ 3)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">จำนวนสั่งสินค้าในหมวด Classic Cars ระหว่างปี 2003-2004(เงื่อนไขที่ 3)</h1>
        <div class="การปรับเเต่งปุ่ม">
            <button onclick="window.location.href='index.php'" class="but">ไปหน้า 1</button>
            <button onclick="window.location.href='index2.php'" class="but">ไปหน้า 2</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>เลขที่สั่งซื้อ</td>
                    <td >รหัสสินค้า</td>
                    <td >ชื่อสินค้า</td>
                    <td >วันที่สั่ง</td>
                    <td >วันที่จัดส่ง</td>
                    <td >สถานะการจัดส่ง</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['order_number'];?></td>
                        <td ><?php echo $row['product_code'];?></td>
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['order_Date'];?></td>
                        <td><?php echo $row['shipped_Date'];?></td>
                        <td><?php echo $row['status'];?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>
</html>
