<?php 

class Booking {
    // creates a zoo ticket
    function book_ticket($conn, $date, $visitors, $user_id) {
        $sql = "INSERT into tickets (user_id, date, num_visitors) values (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user_id, $date, $visitors);
        // $result = $stmt->execute();
        // executes sql and returns an error if it can't be executed
        if (!$stmt->execute()) {
            echo "Error inputting data into db";
        }

        // calculates number of points to award based on visitors attending
        $amount = $visitors * 100;

        // gives the user reward points
        $this->add_points($conn, $user_id, $amount);
    }

    function view_ticket($conn, $user_id) {
        $sql = "SELECT date, num_visitors FROM tickets 
                WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        // below has been moved to /pages/view.php:
        // while ($row = $result->fetch_assoc()) {
        //     echo $row["date"];
        // }

        // gives the data to be displayed
        return $result;
    }

    function view_booking($conn, $user_id) {
        $sql = "SELECT room_num, room_type, check_in, check_out FROM bookings 
                JOIN rooms ON bookings.room_id = rooms.id
                WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // gives the data to be displayed
        return $result;
    }

    function book_hotel ($conn, $user_id, $checkin, $checkout, $room) {
        if ($this->check_dates($conn, $checkin, $room)) {
            // program reaches here if the check in date is available
            if ($this->check_dates($conn, $checkout, $room)) {
                // adds to database if the dates are available
                $this->insert_hotel($conn,$user_id, $checkin, 
                                    $checkout, $room);
                // shows the user the room they have booked 
                header("Location: ../pages/view.php?message=hotelSuccess");
            } else {
                // shows the user there is an issue with their check out date
                header("Location: ../pages/hotel.php?message=checkOutError");
                // echo "Error check out";
            }
        } else {
            // shows the user there is a issue with their check in date
            header("Location: ../pages/hotel.php?message=checkInError");
            // echo "Error check in";
        }
    }

    // return true if the date the user inputs is available
    function check_dates($conn, $date, $room) {
        $sql = "SELECT check_in, check_out FROM bookings
                WHERE room_id = ? AND
                DATE(?) BETWEEN check_in AND check_out";                     
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $room, $date);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($result->fetch_assoc()) {
            // if the room is already booked
            return false; 
        }
        // if the room is available on this date
        return true;
    }

    // inserts the hotel booking information to the database
    function insert_hotel($conn, $user_id, $checkin, $checkout, $room) {
        $sql = "INSERT into bookings (user_id, room_id, check_in, check_out) 
                values (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiss", $user_id, $room, $checkin, $checkout);
        // executes sql and returns an error if an error happens
        if (!$stmt->execute()) {
            echo "Error inputting data into db";
        }

        // formats the check in and check out dates to be used in date_diff
        $checkin = date_create_immutable($checkin);
        $checkout = date_create_immutable($checkout);

        // calculates number of days the user is staying
        $days = date_diff($checkin, $checkout);
    
        // calculates number of days staying, and multiplies by 200
        // formats the date_diff result into just the number of days
        $amount = $days->format("%a") * 200;

        $this->add_points($conn, $user_id, $amount); 
    }

    // adds points to the signed in users account
    // https://www.w3schools.com/SQL/sql_update.asp
    // https://stackoverflow.com/questions/13396119/how-to-add-a-value-to-existing-value-using-sql-query
    function add_points($conn, $user_id, $amount) {
        $sql = "UPDATE users SET points = points + ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $amount, $user_id);
        if (!$stmt->execute()) {
            echo "Error updating loyalty points";
        }
    }
}
