<?php

class ArticleModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getArticleById(int $id): array
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllArticles(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArticle(string $title, string $description):void
    {
        $stmt = $this->db->prepare('INSERT INTO articles (title, description) VALUES (:title, :description)');
        $stmt->execute(['title' => $title, 'description' => $description]);
    }

    public function updateArticle(int $id, string $title, string $description):void
    {
        $stmt = $this->db->prepare('UPDATE articles SET title = :title, description = :description WHERE id = :id');
        $stmt->execute(['id' => $id, 'title' => $title, 'description' => $description]);
    }

    public function deleteArticle(int $id):void
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

}