<?php

class OrderModel extends Database
{
    public function fetch_all_orders(): mysqli_result|bool
    {
        $sql = "SELECT * FROM orders";
        return mysqli_query($this->con, $sql);
    }

    public function get_order($id): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function get_order_by_customer($cid): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM orders WHERE customer_id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $cid);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add_order($customer_id, $total, $address, $note): bool
    {
        $raw_sql = "INSERT INTO orders (customer_id, total, address, note) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("idss", $customer_id, $total, $address, $note);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_order($id, $customer_id, $total, $address, $note): bool
    {
        $raw_sql = "UPDATE orders SET customer_id = ?, total = ?, address = ?, note = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("idssi", $customer_id, $total, $address, $note, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function remove_order($id): bool
    {
        $raw_sql = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
