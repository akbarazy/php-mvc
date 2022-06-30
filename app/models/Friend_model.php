<?php
class Friend_model
{
    private
        $table = 'friends',
        $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function getAllFriends()
    {
        $this->database->query("SELECT * FROM {$this->table}");
        return $this->database->resultSet();
    }

    public function getFriendsById($id)
    {
        $this->database->query("SELECT * FROM {$this->table} WHERE id =:id");
        $this->database->bind('id', $id);

        return $this->database->single();
    }

    public function addFriend($data)
    {
        $query = "INSERT INTO friends VALUES (
            '', :name, :age
        )";
        $this->database->query($query);
        $this->database->bind('name', $data['name']);
        $this->database->bind('age', $data['age']);

        $this->database->execute();
        return $this->database->rowCount();
    }

    public function deleteFriend($id)
    {
        $query = "DELETE FROM friends WHERE id = :id";
        $this->database->query($query);
        $this->database->bind('id', $id);

        $this->database->execute();
        return $this->database->rowCount();
    }

    public function editFriend($data)
    {
        $query = "UPDATE friends SET 
            name = :name,
            age = :age
            WHERE id = :id";
        $this->database->query($query);
        $this->database->bind('name', $data['name']);
        $this->database->bind('age', $data['age']);
        $this->database->bind('id', $data['id']);

        $this->database->execute();
        return $this->database->rowCount();
    }

    public function searchFriends()
    {
        $search = $_POST['search'];
        $query = "SELECT * FROM friends WHERE name LIKE :search";

        $this->database->query($query);
        $this->database->bind('search', "%$search%");
        return $this->database->resultSet();
    }
}
