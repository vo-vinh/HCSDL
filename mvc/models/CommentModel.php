<?php

class CommentModel extends Database
{
    public function fetch_all_comments(): mysqli_result|bool
    {
        $sql = "SELECT * FROM comments";
        return mysqli_query($this->con, $sql);
    }

    public function get_comment($pid, $cid): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM comments WHERE product_id = ? AND customer_id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("ii", $pid, $cid);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function get_comments_by_product($pid): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM comments WHERE product_id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $pid);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add_comment($pid, $cid, $comment): bool
    {
        $raw_sql = "INSERT INTO comments (product_id, customer_id, content) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("iis", $pid, $cid, $comment);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_comment($pid, $cid, $comment): bool
    {
        $raw_sql = "UPDATE comments SET content = ? WHERE product_id = ? AND customer_id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("sii", $comment, $pid, $cid);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function delete_comment($pid, $cid): bool
    {
        $raw_sql = "DELETE FROM comments WHERE product_id = ? AND customer_id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("ii", $pid, $cid);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
