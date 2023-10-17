<?php
function listAllProducts()
{
    global $productList;
    echo "=============== Product List ==================" . PHP_EOL;
    foreach ($productList as $id => $item) {
        echo 'ID: ' . $id . ' Name: ' . $item['name'] . ' Price: ' . $item['price'] . PHP_EOL;
    };
}
function listItem($id){
    global $productList;
    echo "=============================================" . PHP_EOL;
    echo 'Name: ' . $productList[$id]['name'] . PHP_EOL;
    echo 'Price: ' . $productList[$id]['price'] . PHP_EOL;
    echo 'Stock: ' . $productList[$id]['stock'] . PHP_EOL;
    echo "=============================================" . PHP_EOL;
}
function checkItemStock($id): int
{
    global $productList;
    if ($productList[$id]['stock'] <= 0 )  return 0;
    return $productList[$id]['stock'];
}
function incrementStock($id, $quantity){
    global $productList;
    $productList[$id]['stock'] += $quantity;
    echo 'Items Added to stock.'. PHP_EOL;
}
function decrementStock($id, $quantity)
{
    global $productList;
    if (checkItemStock($id) - $quantity <= 0 ) {
        echo "[Decrement Stock] There's not enough inventory for this action." . PHP_EOL;
        return;
    }else {
        $productList[$id]['stock'] -= $quantity;
        echo 'Items Removed from stock.' . PHP_EOL;
    }
}
function getHighestPrice($productList): int{
    $highestPriceId = null;
    foreach ($productList as $id => $item) {
        if($highestPriceId == null){
            $highestPriceId = $id;
            continue;
        }
        if($productList[$highestPriceId]['price'] < $item['price']){
            $highestPriceId = $id;
        }

    }
    echo 'The most expensive product is ' . $productList[$highestPriceId]['name'] . ' which costs ' . $productList[$highestPriceId]['price'] . PHP_EOL;
    return $highestPriceId;
}
function getLowestPrice($productList): int{
    $lowestPriceId = null;
    foreach ($productList as $id => $item) {
        if($lowestPriceId == null){
            $lowestPriceId = $id;
            continue;
        }
        if($productList[$lowestPriceId]['price'] > $item['price']){
            $lowestPriceId = $id;
        }

    }
    echo 'The cheapest product is ' . $productList[$lowestPriceId]['name'] . ' which costs ' . $productList[$lowestPriceId]['price'] . PHP_EOL;
    return $lowestPriceId;
}
function getAveragePrice($productList): float{
    $totalSum = 0.00;
    foreach ($productList as $id => $item) {
       $totalSum += $item['price'];
    }
    return $totalSum / count($productList);
}

listAllProducts();
listItem(101);
incrementStock(101,12);
listItem(101);
decrementStock(101,20);
listItem(101);
getLowestPrice($productList);
getHighestPrice($productList);
$average = getAveragePrice($productList);
echo 'The average price is ' . $average;
