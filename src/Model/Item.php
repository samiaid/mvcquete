<?php

namespace Model;

class Item
{
    private $id;
    private $title;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Item
     */
    public function setId($id): Item
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Item
     */
    public function setTitle($title): Item
    {
        $this->title = $title;
        return $this;
    }

}