<?php

require_once "Book.php";

class Author
{
    private string $name;
    private array $books = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addBook(string $title, float $price): Book
    {
        $book = new Book($title, $price, $this);
        $this->books[] = $book;
        return $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}
