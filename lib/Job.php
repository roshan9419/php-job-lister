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

    // Create Job
    public function create($data)
    {
        // insert query
        $this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email) 
            VALUES (:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)");

        // bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete job
    public function delete($job_id)
    {
        $this->db->query("DELETE FROM jobs where id = $job_id");
        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update Job
    public function update($job_id, $data)
    {
        // insert query
        $this->db->query("UPDATE jobs 
                SET
                category_id = :category_id,
                job_title = :job_title,
                company = :company,
                description = :description,
                location = :location,
                salary = :salary,
                contact_user = :contact_user,
                contact_email = :contact_email
                WHERE id = $job_id");

        // bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
