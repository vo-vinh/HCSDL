<?php

class CustomerModel extends Database
{
    public function fetch_all_customers(): mysqli_result|bool
    {
        $sql = "SELECT * FROM users WHERE role = 'customer' ORDER BY id DESC";
        return mysqli_query($this->con, $sql);
    }

    public function get_customer($cid): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM users WHERE role = 'customer' AND id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $cid);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function update_customer($cid, $name): bool
    {
        $raw_sql = "UPDATE users SET name = ? WHERE role = 'customer' AND id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("si", $name, $cid);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function remove_customer($cid): bool
    {
        $raw_sql = "DELETE FROM users WHERE role = 'customer' AND id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $cid);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
