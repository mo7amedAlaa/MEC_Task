<?php
echo "<h1> task1.1 </h1> ";
class Circle {
private $radius;
private  $color;
public function __construct($radius=0.1, $color='red') {
    $this->radius = $radius;
    $this->color = $color;
}
public function getRadius() {
    return $this->radius;
}

    public function getColor()
    {
        return $this->color;
}
public function setRadius($radius)
{
    $this->radius = $radius;
}

    public function setColor($color)
    {
        $this->color = $color;
}

    public function __toString()
    {
return "Circle [$this->radius ,$this->color]";
}

public function getArea()
{
    return pi() * $this->radius * $this->radius;
}
}
$C1=new Circle(0.1,"red");
echo "Circle Area: ". $C1->getArea()  ."<br>";
echo $C1;

/* #####################
      task 1.2
  ###################### */

echo "<h1> task1.2 </h1> ";
class Employee{
    private  $id;
    private $firstName;
    private $lastName;
    private $salary;

    public function __construct($id , $firstName, $lastName, $salary){
         $this->id = $id;
         $this->firstName = $firstName;
         $this->lastName = $lastName;
         $this->salary = $salary;
    }
    public function getId(){
        return "id:$this->id";
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getName()
    {
        return "Full Name: $this->firstName  $this->lastName";
    }
    public function getSalary(){
        return "Salary: $this->salary";
    }
    public function setSalary($salary){
        $this->salary = $salary;
    }
    public function getAnnualSalary()
    {
            return "Annual Salary: " . $this->salary * 12;
    }
    public function raiseSalary($percent)
    {
         $this->salary += $this->salary*($percent/100);
         return "Salary after raise($percent%):".$this->salary;
    }
     public function __toString(){
         return "Employee=[id= $this->id ,firstName= $this->firstName,lastName= $this->lastName ,salary= $this->salary ]";
     }
}
 $employee1 = new Employee(1 ,"mohamed","Alaa",10000);
 echo $employee1->getName();
 echo "<br>";
 echo $employee1->getSalary();
 echo "<br>";
 echo $employee1->getAnnualSalary();
 echo "<br>";
 echo $employee1;
 echo "<br>";
 $employee1->setSalary(15000);
 echo $employee1->getSalary();
 echo "<br>";
 echo $employee1->raiseSalary(50);
 echo '<br>';
 echo $employee1;
 echo "<br>";
/* #####################
      task 1.3
  ###################### */

echo "<h1> task1.3 </h1> ";
class Rectangle
{
 private $length ;
 private $width;
 public function __construct( $length=1.0 , $width=1.0 ){
     $this->length = $length;
     $this->width = $width;
}

public function getLength(){
     return $this->length;
}
public function getWidth(){
     return $this->width;
}

public function setLength($length){
     $this->length = $length;
}
public function setWidth($width){
     $this->width = $width;
}
public function getArea( ){
   return  "Rectangle Area:" . $this->width * $this->length;
}
public function getPerimeter()
{
return "Rectangle Perimeter: " . (2 * ($this->width + $this->length));
}
public function __toString()
{
    return "Rectangle[length=$this->length, width=$this->width ]";
}
}

$rectangle1= new Rectangle(2.5,9.6);
echo $rectangle1->getArea();
echo "<br>";
echo  $rectangle1->getPerimeter();
echo "<br>";
echo $rectangle1;
echo "<h1> task1.4 </h1> ";
class InvoiceItem
{
    private $id;
    private $desc;
    private $qty;
    private $unitPrice;
    public function __construct($id, $desc, $qty, $unitPrice){
        $this->id = $id;
        $this->desc = $desc;
        $this->qty = $qty;
        $this->unitPrice = $unitPrice;
    }
 public function getId(){
        return $this->id;
 }
 public function getDesc(){
        return $this->desc;
 }
 public function getQty(){
        return $this->qty;
 }
 public function getUnitPrice(){
        return $this->unitPrice;
 }
 public function setQty($qty){
        $this->qty = $qty;
 }
 public function setUnitPrice($unitPrice){
        $this->unitPrice = $unitPrice;
 }
 public function getTotal()
 {
     return "Total: " . $this->qty * $this->unitPrice;
 }
 public function __toString(){
        return "invoiceItem[id:$this->id ,desc:$this->desc,qty:$this->qty,unitPrice:$this->unitPrice]";
 }
}
$invoiceItem1 = new InvoiceItem(1,"Item1 Desc  ",5,1000);
echo $invoiceItem1;
echo "<br>";
echo $invoiceItem1->getTotal();

/* #####################
      task 2.1
  ###################### */

echo "<h1> task 2.1 </h1> ";
class Account {
    private $id;
    private $name;
    private $balance;

    public function __construct($id, $name, $balance = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function credit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this->balance;
    }

    public function debit($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Amount exceeded balance\n";
        }
        return $this->balance;
    }

    public function transferTo($anotherAccount, $amount) {
        if ($amount <= $this->balance) {
            $this->debit($amount);
            $anotherAccount->credit($amount);
        } else {
            echo "Amount exceeded balance\n";
        }
        return $this->balance;
    }
    public function __toString()
    {
        return "Account[id:$this->id ,name:$this->name,balance:$this->balance]";
    }

}

$acc1 = new Account("763", "MohamedAlaa");
$acc2 = new Account("100", "Nasreen");
$acc1->credit(100);
$acc1->transferTo($acc2, 400);

echo "Account 1 balance: " . $acc1->getBalance() . "<br>";
echo "Account 2 balance: " . $acc2->getBalance() . "<br>";

/* #####################
      task 2.2
  ###################### */

echo "<h1> task 2.2 </h1> ";
class Ball {
    private $x;
    private $y;
    private $radius;
    private $xDelta;
    private $yDelta;
    public function __construct($x, $y, $radius, $xDelta, $yDelta) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->xDelta = $xDelta;
        $this->yDelta = $yDelta;
    }
    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getXDelta() {
        return $this->xDelta;
    }

    public function setXDelta($xDelta) {
        $this->xDelta = $xDelta;
    }

    public function getYDelta() {
        return $this->yDelta;
    }

    public function setYDelta($yDelta) {
        $this->yDelta = $yDelta;
    }
    public function move() {
        $this->x += $this->xDelta;
        $this->y += $this->yDelta;
    }
    public function reflectHorizontal() {
        $this->xDelta = -$this->xDelta;
    }
    public function reflectVertical() {
        $this->yDelta = -$this->yDelta;
    }
    public function __toString() {
        return "Ball[(x: {$this->x}, y: {$this->y}), speed: (xDelta: {$this->xDelta}, yDelta: {$this->yDelta})]";
    }
}

$ball = new Ball(0.0, 0.0, 5, 1.0, 1.5);
echo $ball . "<br>" ;
$ball->move();
echo $ball . "<br>";
$ball->reflectHorizontal();
$ball->move();
echo $ball . "<br>";

