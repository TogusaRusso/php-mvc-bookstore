<?php 
namespace Bookstore\Domain;

class Book { 
    private $isbn; 
    private $title; 
    private $author; 
    private $available;
    
    public function __construct(
        int $isbn, 
        string $title,
        string $author, 
        int $available = 0
    ) { 
        $this->isbn = $isbn;
        $this->title = $title; 
        $this->author = $author; 
        $this->available = $available; 
    }
    
    public function getIsbn(): int { 
        return $this->isbn; 
    } 
    public function getTitle(): string { 
        return $this->title; 
    } 
    public function getAuthor(): string { 
        return $this->author; 
    } 
    public function isAvailable(): bool { 
        return $this->available; 
    }    
    
    public function getPrintableTitle(): string {
        $result = '<i>' . $this->title . '</i> - ' . $this->author; 
        if (!$this->available) { 
            $result .= ' <b>Not available</b>'; 
        } 
        return $result; 
    }
    
    public function getCopy(): bool { 
        if ($this->available < 1) { 
            return false; 
        } else { 
            $this->available--; 
            return true; 
        } 
    }
    
    public function addCopy() { 
        $this->available++;
    }
}

/*
$book = new Book(); 
$book->title = "1984"; 
$book->author = "George Orwell"; 
$book->available = true; 
var_dump($book);

$book1 = new Book(); 
$book1->title = "1984"; 
$book2 = new Book(); 
$book2->title = "To Kill a Mockingbird";
var_dump($book1, $book2);
*/
