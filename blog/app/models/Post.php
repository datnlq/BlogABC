<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get posts
    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts');
        return  $this->db->resultSet();
    }

    //Get all posts
    public function getAllPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY create_at ASC');
        return  $this->db->resultSet();
        
    }

    // Add post
    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (user_id, title, body) VALUES(:user_id, :title, :body)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        return $this->db->execute();
    }

    // Update post
    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        return $this->db->execute();
    }

    // Delete post
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    // Find post by id
    public function findPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
  
    }

    // Get post id
    public function getPostId()
    {
        $this->db->query('SELECT id FROM posts ORDER BY id DESC LIMIT 1');
        return $this->db->single();
    }


}