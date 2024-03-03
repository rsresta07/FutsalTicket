<?php
include '../include/connection.php';

if (isset($_GET['booking_date']) && isset($_GET['booking_time'])) {
    $selectedDate = $_GET['booking_date'];
    $selectedTime = $_GET['booking_time'];

    // Query to get booked fields for the selected date and time
    $bookedFieldsQuery = "SELECT field_name FROM tbl_field f
                          JOIN bookings b ON f.field_id = b.field_id
                          WHERE b.booking_date = '$selectedDate' AND b.booking_time = '$selectedTime'";

    $result = mysqli_query($conn, $bookedFieldsQuery);

    if ($result) {
        $bookedFields = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $bookedFields[] = $row['field_name'];
        }

        // Retrieve all fields from tbl_field
        $allFieldsQuery = "SELECT field_id, field_name, field_price FROM tbl_field";
        $allFieldsResult = mysqli_query($conn, $allFieldsQuery);

        if ($allFieldsResult) {
            $availableFields = array(); // Array to store available fields

            while ($row = mysqli_fetch_assoc($allFieldsResult)) {
                $field_id = $row['field_id'];
                $field_name = $row['field_name'];
                $field_price = $row['field_price'];

                // Check if the field is available (not in bookedFields array)
                if (!in_array($field_name, $bookedFields)) {
                    $availableFields[] = array('id' => $field_id, 'name' => $field_name, 'price' => $field_price);
                }
            }

            if (count($availableFields) > 0) {
                echo "<select id='selected_field' name='selected_field' required>";
                echo "<option value=''>Select Field</option>";

                foreach ($availableFields as $field) {
                    echo "<option value='{$field['id']}'>{$field['name']} ({$field['price']})</option>";
                }

                echo "</select>";
            } else {
                echo "<p style='color: rgb(194, 194, 194);'>No available fields at this date and time.</p>";
            }
        }
    }
}
?>
