<?php
namespace tjrightdirection;

class Database extends \LSPHP\DatabaseTable
{
    public function __construct()
    {
        $this->host = 'mysql.tjrightdirection.co.uk';
        $this->database = 'tjrightdirection';
        $this->user = 'tjrightdirection';
        $this->passwd = 'emmatoff';
        $this->table = 'html';
    }

    public function getPageText($page)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE `page` = '" . $page . "';";
        $results = $this->selectQuery($query);
        $pageText = array();
        foreach ($results as $result) {
            $pageText[$result['name']] = urldecode($result['html']);
        }
        return $pageText;
    }

    public function updateText($page, $name, $text)
    {
        $query = "UPDATE {$this->table} SET `html` = '" . urlencode($text) . "' WHERE `page` = '{$page}' AND `name` = '{$name}';";
        $this->insertQuery($query);
    }
}
