<?php

class TransactionModel extends Model {
    public function createTransaction($data) {
        try {
            $this->db->beginTransaction();

            $query = "INSERT INTO transactions (user_id, customer_name, total_amount, cash_received, change_amount) VALUES (:user_id, :customer_name, :total_amount, :cash_received, :change_amount)";
            $this->query($query);
            $this->bind('user_id', $_SESSION['user_id']);
            $this->bind('customer_name', $data['customer_name']);
            $this->bind('total_amount', $data['total_amount']);
            $this->bind('cash_received', $data['cash_received']);
            $this->bind('change_amount', $data['change_amount']);
            $this->execute();
            $transaction_id = $this->lastInsertId();

            foreach($data['items'] as $item) {
                $queryDetail = "INSERT INTO transaction_details (transaction_id, product_id, quantity, price, subtotal) VALUES (:transaction_id, :product_id, :quantity, :price, :subtotal)";
                $this->query($queryDetail);
                $this->bind('transaction_id', $transaction_id);
                $this->bind('product_id', $item['id']);
                $this->bind('quantity', $item['qty']);
                $this->bind('price', $item['price']);
                $this->bind('subtotal', $item['price'] * $item['qty']);
                $this->execute();

                $queryStock = "UPDATE products SET stock = stock - :qty WHERE id = :id";
                $this->query($queryStock);
                $this->bind('qty', $item['qty']);
                $this->bind('id', $item['id']);
                $this->execute();
            }

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
    
    public function getHistory() {
        $this->query("SELECT * FROM transactions ORDER BY created_at DESC");
        return $this->resultSet();
    }
}
