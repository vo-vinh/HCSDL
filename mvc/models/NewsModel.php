<?php

class NewsModel extends Database
{
    public function fetch_all_news(): mysqli_result|bool
    {
        $sql = "SELECT * FROM news";
        return mysqli_query($this->con, $sql);
    }

    public function get_news($id): mysqli_result|bool
    {
        $raw_sql = "SELECT * FROM news WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add_news($img_url, $header, $intro, $content): bool
    {
        $raw_sql = "INSERT INTO news (img_url, header, intro, content) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("ssss", $img_url, $header, $intro, $content);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update_news($id, $img_url, $header, $intro, $content): bool
    {
        $raw_sql = "UPDATE news SET img_url = ?, header = ?, intro = ?, content = ? WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("ssssi", $img_url, $header, $intro, $content, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function remove_news($id): bool
    {
        $raw_sql = "DELETE FROM news WHERE id = ?";
        $stmt = $this->con->prepare($raw_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
