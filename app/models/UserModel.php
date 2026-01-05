<?php

class UserModel extends Model {
    public function getUserByUsername($username) {
        $this->query("SELECT * FROM users WHERE username = :username");
        $this->bind('username', $username);
        return $this->single();
    }

    public function register($data) {
        $query = "INSERT INTO users (username, password, name, role) VALUES (:username, :password, :name, :role)";
        $this->query($query);
        $this->bind('username', $data['username']);
        $this->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->bind('name', $data['name']);
        $this->bind('role', $data['role']);
        $this->execute();
        return $this->rowCount();
    }

    public function getAllUsers() {
        $this->query("SELECT * FROM users");
        return $this->resultSet();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $this->query($query);
        $this->bind('id', $id);
        $this->execute();
        return $this->rowCount();
    }
}
