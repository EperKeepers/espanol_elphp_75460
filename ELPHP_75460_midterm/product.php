<?php
class Product {
    public $name;
    public $price;
    public $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotalPrice() {
        return $this->price * $this->quantity;
    }

    public function addToStock($quantity) {
        $this->quantity += $quantity;
    }

    public function sell($quantity) {
        if ($quantity > $this->quantity) {
            return "Insufficient stock.";
        } else {
            $this->quantity -= $quantity;
            return true;
        }
    }
}

$product = new Product("Widget", 10.99, 50);
echo "Total Price: $" . number_format($product->getTotalPrice(), 2) . "\n";  // Should output Total Price: $549.50
$product->addToStock(25);
echo "Updated Stock: " . $product->quantity . "\n"; // Should output Updated Stock: 75
$result = $product->sell(30);
if ($result === true) {
    echo "Sale successful!\n";
    echo "Updated Stock: " . $product->quantity . "\n"; // Should output Updated Stock: 45
} else {
    echo "Sale failed. " . $result . "\n"; // Should output Sale failed. Insufficient stock.
}
?>