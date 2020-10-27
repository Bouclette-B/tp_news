<?php

namespace App\model;

use \DateTime;

class News
{
    private $_id;
    private $_author;
    private $_title;
    private $_content;
    private $_creationDate;
    private $_updateDate = null;

    public function __construct(?array $data = null)
    {
        if(!empty($data)){
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __set($attribut, $value)
    {
        $attribut = "_$attribut";
        if($attribut){
            $this->$attribut = $value;
        }
    }

    public function getId()
    {
        return $this->_id;
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

    public function setId($id)
    {
        if (is_int($id)) {
            $this->_id = $id;
        }
    }
    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setCreationDAte(DateTime $creationDate)
    {
            $this->_creationDate = $creationDate;
    }

    public function setUpdateDate(DateTime $updateDate)
    {
            $this->_updateDate = $updateDate;
    }

    public function getExcerpt(){
        if(strlen(strip_tags($this->getContent())) > 199)
        {
            $excerpt = substr($this->getContent(), 0, 199);
            $excerpt = substr($excerpt, 0, strrpos($excerpt, ' ')). ' ...';
        }else
        {
            $excerpt =  $this->getContent();
        }
        return nl2br($excerpt);
    }


}
