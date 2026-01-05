<?php

class CategoryModel extends Model {
    public function getAllCategories() {
        $this->query("SELECT * FROM categories ORDER BY name ASC");
        return $this->resultSet();
    }

    public function getCategoryById($id) {
        $this->query("SELECT * FROM categories WHERE id = :id");
        $this->bind('id', $id);
        return $this->single();
    }

    public function addCategory($data) {
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $this->query($query);
        $this->bind('name', $data['name']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateCategory($data) {
        $query = "UPDATE categories SET name = :name WHERE id = :id";
        $this->query($query);
        $this->bind('name', $data['name']);
        $this->bind('id', $data['id']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteCategory($id) {
        $query = "DELETE FROM categories WHERE id = :id";
        $this->query($query);
        $this->bind('id', $id);
        $this->execute();
        return $this->rowCount();
    }
}
