<?php

class UserModel extends Database
{
    public function fetch_all_users(): mysqli_result|bool
    {
        $sql = "SELECT * FROM users";
        return mysqli_query($this->con, $sql);
    }

    public function compare_user($email, $password): array|null|bool
    {
        $raw_sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        // Check if the user exists or more than one user exists
        $result = $stmt->get_result();
        if ($result->num_rows != 1) {
            return false;
        }
        // Check if the password is correct with password_hash
        $user = $result->fetch_assoc();
        if (!password_verify($password, $user['password_hash'])) {
            return false;
        }
        return $user;
    }

    public function get_user($id): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add_user(array $record): bool
    {
        $raw_sql = "INSERT INTO users (name, email, phone, password_hash) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($raw_sql);
        $name = $record["name"];
        $email = $record["email"];
        $phone = $record["phone"];
        $password_hash = password_hash($record["password"], PASSWORD_BCRYPT);
        $stmt->bind_param("ssss", $name, $email, $phone, $password_hash);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_name($id, $name): bool
    {
        $raw_sql = "UPDATE users SET name = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("si", $name, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_email($id, $email): bool
    {
        $raw_sql = "UPDATE users SET email = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_phone($id, $phone): bool
    {
        $raw_sql = "UPDATE users SET phone = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("si", $phone, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_password($id, $password): bool
    {
        $raw_sql = "UPDATE users SET password_hash = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("si", $password_hash, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function remove_user($id): bool
    {
        $raw_sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}

