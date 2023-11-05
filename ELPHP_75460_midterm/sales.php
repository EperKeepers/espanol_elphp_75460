<?php
function calculateTotalSales($salesData, $productName) {
    $totalSales = 0.0;

    $salesLines = explode("\n", $salesData);

    foreach ($salesLines as $line) {
        $lineParts = explode(",", $line);

        $lineProductName = trim($lineParts[0]);
        if ($lineProductName === $productName) {
            $price = floatval(trim($lineParts[1]));
            $quantity = intval(trim($lineParts[2]));
            $lineTotalSales = $price * $quantity;
            $totalSales += $lineTotalSales;
        }
    }
    $totalSalesFormatted = number_format($totalSales, 2, '.', '');
    return $totalSalesFormatted;
}

$salesData = "Product A,100.50,5
Product B,75.25,3
Product A,50.25,2
Product C,30.00,1
Product A,75.50,4";
$productName = "Product A";
$totalSales = calculateTotalSales($salesData, $productName);
echo "Total sales for $productName: PHP " . $totalSales;
?>