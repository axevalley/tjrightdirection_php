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
}
