<?php
class Application
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserApplicationByJobId($user_id, $job_id)
    {
        $this->db->query("SELECT * FROM applications WHERE user_id = :user_id and job_id = :job_id ");
        $this->db->bind(":user_id", $user_id);
        $this->db->bind(":job_id", $job_id);
        return $this->db->single();
    }

    public function getUserApplications($user_id) {
        $this->db->query("SELECT * FROM applications WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        return $this->db->single();
    }

    public function create($user_id, $job_id)
    {
        // insert query
        $this->db->query("INSERT INTO applications (user_id, job_id) VALUES (:user_id, :job_id)");

        // bind data
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':job_id', $job_id);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
