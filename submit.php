<!DOCTYPE html>
<html>
<head>
    <title>Booking Summary</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="summary-box">
    <h2>Booking Summary</h2>

    <?php
    // Helper function to get value from multiple possible keys
    function get_param($keys, $default = 'Not Provided') {
        foreach ($keys as $key) {
            if (isset($_POST[$key]) && $_POST[$key] !== '') {
                return $_POST[$key];
            }
        }
        return $default;
    }

    // Map fields from both booking.html (lowercase) and index.html (camelCase)
    $name = get_param(['fullname', 'fullName']);
    $email = get_param(['email']);
    $phone = get_param(['phone']);
    $date = get_param(['date', 'bookingDate']);
    $location = get_param(['location', 'pickupLocation']);
    $car = get_param(['car']);
    
    // Additional fields from index.html
    $returnDate = get_param(['returnDate'], '-');
    $purpose = get_param(['purpose'], '-');
    $payment = get_param(['paymentMethod'], '-');
    $total = get_param(['totalCost'], '-');
    ?>

    <p><b>Name:</b> <?php echo htmlspecialchars($name); ?></p>
    <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>
    <p><b>Phone:</b> <?php echo htmlspecialchars($phone); ?></p>
    <p><b>Pickup Date:</b> <?php echo htmlspecialchars($date); ?></p>
    <p><b>Pickup Location:</b> <?php echo htmlspecialchars($location); ?></p>
    <p><b>Car Model Selected:</b> <?php echo htmlspecialchars($car); ?></p>
    
    <p><b>Purpose:</b> <?php echo htmlspecialchars($purpose); ?></p>
    
    <hr>
    <?php if ($returnDate !== '-'): ?>
    <p><b>Return Date:</b> <?php echo htmlspecialchars($returnDate); ?></p>
    <?php endif; ?>

    <?php if ($payment !== '-'): ?>
    <p><b>Payment Method:</b> <?php echo htmlspecialchars($payment); ?></p>
    <?php endif; ?>

    <?php if ($total !== '-'): ?>
    <p><b>Total Cost:</b> ₹<?php echo htmlspecialchars($total); ?></p>
    <?php endif; ?>

    <a href="index.html" class="btn">Go Back Home</a>
</div>



</body>
</html>
