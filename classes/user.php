<?php 

class User {
    function createAccount($conn, $email, $password) {
        // encrypts the password
        $hash = $this->hashPassword($password);
        $sql = "INSERT into users (email, password_hash) values (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $hash);
        // $result = $stmt->execute();
        if (!$stmt->execute()) {
            echo "Error inputting data into db";
        }
    }

    function hashPassword($password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        // echo $hash;
        return $hash;
    }  

    function logIn($conn, $email, $password) {
        $row = $this->checkEmail($conn, $email);

        if (password_verify($password, $row["password_hash"])) {
            // signs the user in
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $email;
            header("Location: ../pages/index.php?status=correct");
        } else {
            // takes user back to the sign in page
            header("Location: ../pages/signin.php?status=incorrect");
        }

        // $sql = "SELECT password_hash from users
        //         WHERE email = ?";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("s", $row["email"]);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // while ($row = $result -> fetch_assoc()) {
            // echo $row["password_hash"];
        }
    

    // this function is not needed, it does not check that the email exists
    function checkEmail($conn, $email) {
        // checks the email address exists in the db
        $sql = "SELECT id, email, password_hash FROM users 
                WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        // https://www.php.net/manual/en/mysqli-stmt.get-result.php
        $result = $stmt->get_result();
        while ($row = $result -> fetch_assoc()) {
            return $row;
        }
    }

    function signOut() {
        session_destroy();
    }
}
