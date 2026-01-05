<?php

class ProductModel extends Model {
    public function getAllProducts() {
        $this->query("SELECT products.*, categories.name as category_name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY products.created_at DESC");
        return $this->resultSet();
    }

    public function getProductById($id) {
        $this->query("SELECT products.*, categories.name as category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE products.id = :id");
        $this->bind('id', $id);
        return $this->single();
    }

    public function getRelatedProducts($category_id, $exclude_id, $limit = 4) {
        $this->query("SELECT products.*, categories.name as category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE products.category_id = :category_id AND products.id != :exclude_id ORDER BY RAND() LIMIT :limit");
        $this->bind('category_id', $category_id);
        $this->bind('exclude_id', $exclude_id);
        $this->bind('limit', $limit);
        return $this->resultSet();
    }

    public function addProduct($data) {
        $query = "INSERT INTO products (name, category_id, description, price, stock, type) VALUES (:name, :category_id, :description, :price, :stock, :type)";
        $this->query($query);
        $this->bind('name', $data['name']);
        $this->bind('category_id', $data['category_id']);
        $this->bind('description', $data['description']);
        $this->bind('price', $data['price']);
        $this->bind('stock', $data['stock']);
        $this->bind('type', $data['type']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateProduct($data) {
        $query = "UPDATE products SET name = :name, category_id = :category_id, description = :description, price = :price, stock = :stock, type = :type WHERE id = :id";
        $this->query($query);
        $this->bind('name', $data['name']);
        $this->bind('category_id', $data['category_id']);
        $this->bind('description', $data['description']);
        $this->bind('price', $data['price']);
        $this->bind('stock', $data['stock']);
        $this->bind('type', $data['type']);
        $this->bind('id', $data['id']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $this->query($query);
        $this->bind('id', $id);
        $this->execute();
        return $this->rowCount();
    }

    public function updateStock($id, $stock) {
        $query = "UPDATE products SET stock = :stock WHERE id = :id";
        $this->query($query);
        $this->bind('stock', $stock);
        $this->bind('id', $id);
        $this->execute();
        return $this->rowCount();
    }
}
