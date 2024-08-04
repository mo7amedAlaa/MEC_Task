<?php
echo '<h2 style="text-transform: capitalize; text-align: center "> week6 tasks  </h2>';
/*_-_-_-_-_-_-_-_-_-_-_-  TASK 3.1  _-_-_-_-_-_-_-_-_-_-_-*/
echo '<h2 style="text-transform: capitalize"> task 3.1 OOP </h2>';
class Author
{
    private $name;
    private $email;
    private $gender;

    public function __construct($name, $email, $gender)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function __toString()
    {
        return "Author [name={$this->name}, email={$this->email}, gender={$this->gender}]";
    }
}

class Book
{
    private $name;
    private $authors;
    private $price;
    private $qty;

    public function __construct($name, array $authors, $price, $qty = 0)
    {
        $this->name = $name;
        $this->authors = $authors;
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function getAuthorNames()
    {
        $authorNames = array_map(function ($author) {
            return $author->getName();
        }, $this->authors);
        return implode(', ', $authorNames);
    }

    public function __toString()
    {
        $authorStrings = array_map(function ($author) {
            return $author->__toString();
        }, $this->authors);
        $authorsString = implode(', ', $authorStrings);
        return "Book [name={$this->name}, authors={$authorsString}, price={$this->price}, qty={$this->qty}]";
    }
}
$author1 = new Author("John Doe", "john@example.com", 'M');
$author2 = new Author("Jane Smith", "jane@example.com", 'F');
$book = new Book("Sample Book", [$author1, $author2], 29.99, 10);
echo $book . "<br>"; // Uses __toString method


echo "Name: " . $book->getName() .  "<br>";
echo "Price: " . $book->getPrice() .  "<br>";
echo "Quantity: " . $book->getQty() .  "<br>";
echo "Authors: " . $book->getAuthorNames() .  "<br>";
$book->setPrice(40.65);
$book->setQty(6);
echo $book . "<br>";

/*_-_-_-_-_-_-_-_-_-_-_-  TASK 3.2  _-_-_-_-_-_-_-_-_-_-_-*/
echo '<h2 style="text-transform: capitalize"> task 3.2 OOP </h2>';

class Circle1
{
    private $radius;
    private $color;

    public function __construct($radius = 1.0, $color = "red")
    {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getArea()
    {
        return pi() *  $this->radius * $this->radius ;
    }

    public function __toString()
    {
        return "Circle[radius={$this->radius}, color={$this->color}]";
    }
}


class Cylinder extends Circle1
{
    private $height;

    public function __construct($radius = 1.0, $height = 1.0, $color = "red")
    {
        parent::__construct($radius, $color);
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getVolume()
    {
        return $this->getArea() * $this->height;
    }

    public function __toString()
    {
        return "Cylinder[radius={$this->getRadius()}, height={$this->height}, color={$this->getColor()}]";
    }
}
$circle = new Circle1(5.0, "blue");
echo $circle .  "<br>";
echo "Area: " . $circle->getArea() .  "<br>";
$cylinder = new Cylinder(5.0, 10.0, "green");
echo $cylinder .  "<br>";
echo "Volume: " . $cylinder->getVolume() .  "<br>";

/*_-_-_-_-_-_-_-_-_-_-_-  TASK 4.1  _-_-_-_-_-_-_-_-_-_-_-*/
echo '<h2 style="text-transform: capitalize"> task 4.1 OOP </h2>';
abstract class Person {
    protected $name;
    protected $address;

    public function __construct($name, $address) {
        $this->name = $name;
        $this->address = $address;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    abstract public function toString();
}

class Student extends Person
{
    private $program;
    private $year;
    private $fee;

    public function __construct($name, $address, $program, $year, $fee)
    {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = $fee;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function setProgram($program)
    {
        $this->program = $program;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    public function toString()
    {
        return "Student [Person[name={$this->name}, address={$this->address}], program={$this->program}, year={$this->year}, fee={$this->fee}]";
    }
}

class Staff extends Person
{
    private $school;
    private $pay;

    public function __construct($name, $address, $school, $pay)
    {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = $pay;
    }

    public function getSchool()
    {
        return $this->school;
    }

    public function setSchool($school)
    {
        $this->school = $school;
    }

    public function getPay()
    {
        return $this->pay;
    }

    public function setPay($pay)
    {
        $this->pay = $pay;
    }

    public function toString()
    {
        return "Staff [Person[name={$this->name}, address={$this->address}], school={$this->school}, pay={$this->pay}]";
    }
}

$student = new Student("mohamed3laa", "123 df Street", "Computer Science", 2, 16000.00);
echo $student->toString() . "<br>";
$student->setAddress("45  Kornash Elvallal Benha ");
echo "Updated Address: " . $student->getAddress() . "<br>";
$staff = new Staff("Jana Ahmed ", "789 er street", "ElFayoume High School", 30000.00);
echo $staff->toString() . "<br>";
$staff->setSchool("Greenwood Academy");
echo "Updated School: " . $staff->getSchool() . "<br>";


/*_-_-_-_-_-_-_-_-_-_-_-  TASK 4.2  _-_-_-_-_-_-_-_-_-_-_-*/
echo '<h2 style="text-transform: capitalize"> task 4.2 OOP </h2>';


interface Shape
{
    public function getColor();

    public function setColor($color);

    public function isFilled();

    public function setFilled($filled);

    public function toString();
}
class Circle implements Shape {
    protected $color;
    protected $filled;
    protected $radius;

    public function __construct($radius = 1.0, $color = "red", $filled = true) {
        $this->radius = $radius;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function isFilled() {
        return $this->filled;
    }

    public function setFilled($filled) {
        $this->filled = $filled;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * pow($this->radius, 2);
    }

    public function getPerimeter() {
        return 2 * pi() * $this->radius;
    }

    public function toString() {
        return "Circle[Shape[color={$this->color}, filled={$this->filled}], radius={$this->radius}]";
    }
}
class Rectangle implements Shape {
    protected $color;
    protected $filled;
    protected $width;
    protected $length;

    public function __construct($width = 1.0, $length = 1.0, $color = "red", $filled = true) {
        $this->width = $width;
        $this->length = $length;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function isFilled() {
        return $this->filled;
    }

    public function setFilled($filled) {
        $this->filled = $filled;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getArea() {
        return $this->width * $this->length;
    }

    public function getPerimeter() {
        return 2 * ($this->width + $this->length);
    }

    public function toString() {
        return "Rectangle[Shape[color={$this->color}, filled={$this->filled}], width={$this->width}, length={$this->length}]";
    }
}
class Square extends Rectangle {
    public function __construct($side = 1.0, $color = "red", $filled = true) {
        parent::__construct($side, $side, $color, $filled);
    }

    public function getSide() {
        return $this->width;
    }

    public function setSide($side) {
        $this->width = $side;
        $this->length = $side;
    }

    public function setWidth($side) {
        $this->setSide($side);
    }

    public function setLength($side) {
        $this->setSide($side);
    }

    public function toString() {
        return "Square[Rectangle[Shape[color={$this->color}, filled={$this->filled}], width={$this->width}, length={$this->length}]]";
    }
}

$circle = new Circle(5.0, "blue", true);
echo $circle->toString() . "<br>";
$circle->setColor("green");
echo "Updated Color: " . $circle->getColor() . "<br>";
$rectangle = new Rectangle(4.0, 6.0, "yellow", false);
echo $rectangle->toString() . "<br>";
$rectangle->setWidth(5.0);
$rectangle->setLength(7.0);
echo "Updated Width: " . $rectangle->getWidth() . "<br>";
echo "Updated Length: " . $rectangle->getLength() . "<br>";
$square = new Square(4.0, "purple", true);
echo $square->toString() . "<br>";
$square->setSide(6.0);
echo "Updated Side: " . $square->getSide() . "<br>";



