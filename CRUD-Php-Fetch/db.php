<?php
require_once 'config.php';
class Database extends Config
{
    // Insert user into database
    public function insert($fname, $lname, $email, $phone)
    {
        $sql = 'INSERT INTO users (first_name, last_name, email, phone) VALUES(:fname, :lname,:email,:phone)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone
        ]);
        return true;
    }
    // fetch all users from database
    public function read()
    {
        $sql = 'SELECT * FROM users ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // fetch sigle user from database
    public function readOne($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }
    // Update sigle user from database
    public function update($id, $fname, $lname, $email, $phone)
    {
        $sql = 'UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phone' => $phone
        ]);
        
        return true;
    }
    // Delete sigle user from database
    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        
        return true;
    }
}
