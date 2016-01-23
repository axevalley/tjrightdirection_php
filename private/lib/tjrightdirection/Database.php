<?php
namespace tjrightdirection;

class Database extends \LSPHP\DatabaseConnection
{
    public function __construct()
    {
        $this->host = 'mysql.tjrightdirection.co.uk';
        $this->database = 'tjrightdirection';
        $this->user = 'tjrightdirection';
        $this->passwd = 'emmatoff';
    }

    public function getPageText($page)
    {
        $query = "SELECT * FROM html WHERE `page` = '" . $page . "';";
        $results = $this->selectQuery($query);
        $pageText = array();
        foreach ($results as $result) {
            $pageText[$result['name']] = urldecode($result['html']);
        }
        return $pageText;
    }

    public function getText($page, $name)
    {
        $query = "SELECT `html` FROM html WHERE `page` = '{$page}' and `name` = '{$name}';";
        $result = $this->selectQuery($query);
        return urldecode($result[0]['html']);
    }

    public function updateText($page, $name, $text)
    {
        $query = "UPDATE html SET `html` = '" . urlencode($text) . "' WHERE `page` = '{$page}' AND `name` = '{$name}';";
        $this->insertQuery($query);
    }

    public function getPhoneNumbers()
    {
        $query = "SELECT `name`, `number` FROM contact_phone ORDER BY `sort`;";
        $results = $this->selectQuery($query);
        return $results;
    }

    public function getJobNames()
    {
        $query = "SELECT `id`, `job_name` FROM gallery_jobs;";
        $results = $this->selectQuery($query);
        $jobs = array();
        foreach ($results as $result) {
            $jobs[$result['job_name']] = $result['id'];
        }
        return $jobs;
    }

    public function getNextImageNumberForJob($jobID)
    {
        $query = "SELECT gallery_images.id FROM gallery_images INNER JOIN gallery_jobs ON gallery_images.gallery_jobs_id=gallery_jobs.id WHERE gallery_jobs.id = {$jobID} ORDER BY gallery_images.sort_order DESC LIMIT 1;";
        $result = $this->selectQuery($query);
        print_r($result);
        if (isset($result[0])) {
            $sortNumber = $result[0]['id'] + 1;
        } else {
            $sortNumber = 0;
        }
        return $sortNumber;
    }

    public function getNextJobNumber()
    {
        $query = "SELECT `sort_order` FROM gallery_jobs ORDER BY `sort_order` DESC LIMIT 1;";
        $result = $this->selectQuery($query);
        if (isset($result[0])) {
            return $result[0]['sort_order'] + 1;
        } else {
            return 0;
        }
    }

    public function getGalleryJobIDByName($jobName)
    {
        $query = "SELECT `id` FROM gallery_jobs WHERE `job_name` = '{$jobName}';";
        $result = $this->selectQuery($query);
        $jobID = $result[0]['id'];
        return $jobID;
    }

    public function addGalleryJob($jobName)
    {
        $sortNumber = $this->getNextJobNumber();
        $query = "INSERT INTO gallery_jobs (`job_name`, `sort_order`) VALUES ('{$jobName}', {$sortNumber});";
        $this->insertQuery($query);
        return $this->getGalleryJobIDByName($jobName);
    }

    public function addImageToGallery($filename, $jobID, $sortNumber)
    {
        $query = "INSERT INTO gallery_images (`filename`, `gallery_jobs_id`, `sort_order`) VALUES ('{$filename}', {$jobID}, {$sortNumber});";
        $this->insertQuery($query);
    }

    public function getAllImages()
    {
        $query = "SELECT * FROM gallery_images INNER JOIN gallery_jobs ON gallery_images.gallery_jobs_id=gallery_jobs.id ORDER BY gallery_jobs.sort_order ASC, gallery_images.sort_order ASC;";
        $result = $this->selectQuery($query);
        return $result;
    }
}
