<?php

class Book
{
    private string $title;
    private float $price;
    private ?Author $author;

    public function __construct(string $title, float $price, ?Author $author = null)
    {
        $this->title = $title;
        $this->price = $price;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }
}
