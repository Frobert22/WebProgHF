<?php

require_once "AbstractLibrary.php";
require_once "Author.php";
require_once "Book.php";

class Library extends AbstractLibrary
{
    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        $this->authors[] = $author;
        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        foreach ($this->authors as $author) {
            if ($author->getName() === $authorName) {
                $author->addBook($book->getTitle(), $book->getPrice());
                $book->setAuthor($author);
                return;
            }
        }
    }

    public function getBooksForAuthor($authorName)
    {
        foreach ($this->authors as $author) {
            if ($author->getName() === $authorName) {
                return $author->getBooks();
            }
        }
        return [];
    }

    public function search(string $bookName): ?Book
    {
        foreach ($this->authors as $author) {
            foreach ($author->getBooks() as $book) {
                if ($book->getTitle() === $bookName) {
                    return $book;
                }
            }
        }
        return null;
    }

    public function print()
    {
        foreach ($this->authors as $author) {
            echo $author->getName() . PHP_EOL;
            echo "--------------------" . PHP_EOL;
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle() . " - " . $book->getPrice() . PHP_EOL;
            }

        }
    }
}
