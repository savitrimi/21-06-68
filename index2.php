<?php
include("connect.php");
$sql = "SELECT em.employeeNumber as Number, em.firstName as firstname, em.lastName as lastName, COUNT(ord.orderNumber) AS totalOrders
FROM employees em
LEFT OUTER JOIN customers cou ON em.employeeNumber = cou.salesRepEmployeeNumber
LEFT OUTER JOIN orders ord ON cou.customerNumber = ord.customerNumber
GROUP BY em.employeeNumber, em.lastName, em.firstName;";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เงื่อนไขที่ 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">ข้อมูลยอดรวมการสั่ง Order ทั้งหมดของพนักงาน(เงื่อนไขที่ 2)</h1>
        <div class="การปรับเเต่งปุ่ม">
            <button onclick="window.location.href='index.php'" class="but">ไปหน้า 1</button>
            <button onclick="window.location.href='index3.php'" class="but">ไปหน้า 3</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>รหัสพนักงาน</td>
                    <td >ชื่อพนักงาน</td>
                    <td >นามสกุลพนักงาน</td>
                    <td >ยอดรวมการสั่ง Order ทั้งหมด</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Number'];?></td>
                        <td ><?php echo $row['firstname'];?></td>
                        <td><?php echo $row['lastName'];?></td>
                        <td><?php echo $row['totalOrders'];?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

    </div>
</body>
</html>
