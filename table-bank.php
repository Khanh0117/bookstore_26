<?php
require_once('inc/db.php');
$info_id = $_GET['id'];
?>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Stt</th>
            <th>Ngân hàng</th>
            <th>Số tài khoản</th>
            <th>Tên tài khoản</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $payment = "SELECT * from users_payment where Idtk='$info_id'";
        $runpay = $conn->query($payment);
        if ($runpay->num_rows > 0) {
            $payment_stt = 0;
            while ($rowpay = $runpay->fetch_array()) {
                $payment_stt++;
                $bank_id = $rowpay['Idpay'];
                $bank = $rowpay['Bank'];
                $sotk = $rowpay['Sotk'];
                $tentk = $rowpay['Tentk'];
        ?>
                <tr>
                    <td><?php echo $payment_stt ?></td>
                    <td><?php echo $bank ?></td>
                    <td><?php echo $sotk ?></td>
                    <td><?php echo $tentk ?></td>
                    <td><button type="button" class="btn btn-danger" id="btn-del-bank<?php echo $bank_id ?>"><i class="fa fa-trash"></i></button></td>
                </tr>
                <script>
                    $('#btn-del-bank<?php echo $bank_id ?>').click(function() {
                        var bank_id = <?php echo $bank_id ?>;
                        $.ajax({
                            method: 'POST',
                            url: 'inc/process.php',
                            data: {
                                del_bank: bank_id
                            },
                            success: function(response) {
                                alert(response);
                                fetchdata();
                            }
                        });
                    });
                </script>
        <?php
            }
        } else {
            echo "Không có thông tin thanh toán nào hết";
        }
        ?>
    </tbody>
</table>