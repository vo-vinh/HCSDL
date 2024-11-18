<?php

class ProductModel extends Database
{
    public function fetch_all_products(): mysqli_result|bool
    {
        $sql = "SELECT * FROM products";
        return mysqli_query($this->con, $sql);
    }

    public function get_product($id): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function get_product_by_name($name): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM products WHERE name LIKE ?";
        $stmt = $this->con->prepare($raw_sql);
        $param = "%$name%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add_product(array $record): bool
    {
        $raw_sql = "INSERT INTO products (category_id, name, qty, price, img_url, description) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("isiiss",
            $record['category_id'], $record['name'], $record['qty'], $record['price'],
            $record['img_url'], $record['description']);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_product($id, array $record): bool
    {
        $raw_sql = "UPDATE products SET category_id = ?, name = ?, qty = ?, price = ?, img_url = ?, description = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("isiissi",
            $record['category_id'], $record['name'], $record['qty'], $record['price'],
            $record['img_url'], $record['description'], $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function remove_product($id): bool
    {
        $raw_sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
