<?php

namespace LF\Bundle\QuoteBundle\Entity;

class Quote
{
    private $id;
    private $author;
    private $text;
    private $path;
    private $vote = 0;
    private $createdAt;
    private $link;
    private $image;
    private $nbVote = 0;
    
    public function increaseVote()
    {
        $this->vote++;
        $this->nbVote++;
    }
    
    public function decreaseVote()
    {
        $this->vote--;
        $this->nbVote++;
    }
    
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }
    public function getVote()
    {
        return $this->vote;
    }
    public function setVote($vote)
    {
        $this->vote = $vote;
    }
    public function getNbVote()
    {
        return $this->nbVote;
    }
    public function setNbVote($nbVote)
    {
        $this->nbVote = $nbVote;
    }
    
    public function setLink($link)
    {
    	$this->link = $link;
    }
    
    public function getImage()
    {
    	return $this->image;
    }
    

    public function getLink()
    {
    	return $this->link;
    }
    

    public function getDescriptionLink()
    {
    	return $this->descriptionLink;
    }
    
    public function setDescriptionLink($descriptionLink)
    {
    	$this->descriptionLink = $descriptionLink;
    }
    public function setImage($image)
    {
    	$this->image = $image;
    }
    public function getDescriptionImage()
    {
    	return $this->descriptionImage;
    }
    
    public function setDescriptionImage($descriptionImage)
    {
    	$this->descriptionImage = $descriptionImage;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}

