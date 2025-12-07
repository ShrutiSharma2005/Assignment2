<!DOCTYPE html>
<html>
<head>
    <title>Booking Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 90%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .del-btn { color: white; background: red; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Manage Car Bookings</h1>
    <a href="index.html" class="btn">Back to Home</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Car</th>
            <th>Booking Date</th>
            <th>Return Date</th>
            <th>Actions</th>
        </tr>
        
        <?php
        require_once 'db_connect.php';

        // DELETE LOGIC
        if (isset($_GET['delete_id'])) {
            $id = intval($_GET['delete_id']);
            $conn->query("DELETE FROM bookings WHERE id=$id");
            echo "<p style='color:green; text-align:center;'>Booking ID $id Deleted.</p>";
        }

        // SELECT LOGIC
        $result = $conn->query("SELECT * FROM bookings ORDER BY id DESC");
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["car"]) . "</td>";
                echo "<td>" . $row["booking_date"] . "</td>";
                echo "<td>" . $row["return_date"] . "</td>";
                // Deletion Link
                echo "<td><a href='bookings.php?delete_id=" . $row["id"] . "' class='del-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center'>No bookings found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
