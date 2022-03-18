<?php
class Job
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id ORDER BY post_date DESC");
        // assign result set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get Job
    public function getJob($job_id)
    {
        $this->db->query("SELECT * FROM jobs WHERE id = :job_id");
        $this->db->bind(":job_id", $job_id);
        return $this->db->single();
    }

    // Get categories
    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");
        return $this->db->resultSet();
    }

    // Filter by category
    public function getJobsByCategory($category)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.category_id = $category ORDER BY post_date DESC");
        return $this->db->resultSet();
    }

    // Get category
    public function getCategory($category_id)
    {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(":category_id", $category_id);
        return $this->db->single();
    }
}
