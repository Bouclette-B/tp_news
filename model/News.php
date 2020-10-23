<?php
namespace App\model;
class News
{
    private $_author;
    private $_title;
    private $_content;
    private $_creationDate;
    private $_updateDate;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getCreationDate()
    {
        return $this->_creationDate;
    }

    public function getUpdateDate()
    {
        return $this->_updateDate;
    }

    public function setAuthor($author)
    {
        if(is_string($author))
        {
            $this->_author = $author;
        }
    }

    public function setTitle($title)
    {
        if(is_int($title))
        {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if(is_int($content))
        {
            $this->_content = $content;
        }
    }

    public function setCreationDAte()
    {
        if(!$this->_creationDate)
        {
            $date = new DateTime;
            $this->_creationDate = $date->format('d/m/Y');
        }
    }

    public function setUpdateDate()
    {
        if($this->_creationDate)
        {
            $date = new DateTime;
            $this->_updateDate = $date->format('d/m/Y');
        }
    }
}