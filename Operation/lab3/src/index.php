<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function generateOTP() {
    return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
}

function isOTPExpired($expiryTime) {
    return time() > $expiryTime; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action'])) {
    if($_GET['action'] == 'generate'){
        $otp = generateOTP();
        $expiryTime = time() + 300;
        $_SESSION['otp'] = $otp;
        $_SESSION['expiry_time'] = $expiryTime;
        file_put_contents("logging.txt", date('Y-m-d H:i:s') . " $otp $expiryTime\n", FILE_APPEND);
    }
    elseif($_GET['action'] == 'send_otp'){
        $otp = $_POST['otp'];
        if (isset($_SESSION['otp']) && $_SESSION['otp'] == $otp) {
            if (!isOTPExpired($_SESSION['expiry_time'])) {
                $message = "<h2>Flag : {LAB-OTP-003}</h2>";
            } else {
                $message = "The OTP has expired.";
            }
        } else {
            $message = "Incorrect OTP!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
</head>
<body>
    <form method="post" action="?action=generate">
        <button type="submit">Generate OTP</button>
    </form>

    <h2>Enter OTP</h2>
    <form method="post" action="?action=send_otp">
        <input type="text" name="otp" maxlength="6" required>
        <button type="submit">Verify OTP</button>
    </form>

    <?php
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

</body>
</html>
