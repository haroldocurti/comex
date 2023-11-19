<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
global $gameRepository, $dao, $shoppingCart;
if ($_SESSION['games']==null) {
    $_SESSION['games'] = $gameRepository->allProducts($dao->fetchAllGames());
}
    $games = $_SESSION['games'];

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Product Information Form</title>

    </head>
    <body>
    <div class="top-bar">
        <nav>
            <ul>
                <li><a href="products.php">Products Management</a></li>
                <li><a href="client_form.php">Client Form</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h2>Product Management</h2>
        <h3>Add a new product? <a href="product_form.php">Click here</a></h3>

        <table>
            <thead>
            <tr>
                <th>Products</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                <?php
                foreach ($games as $game) {
                    echo '<tr><td>' . $game->getProductName() . '</td>';
                    echo '<td><small>
                                <a href="editProduct.php?method=add&id='
                        . $game->getProductID() .'">➕
                                
                                </a></small>'
                               . $game->getStockQuantity() . '
                              <small>
                                <a href="editProduct.php?method=del&id='
                               . $game->getProductID() .'">➖
                                 </small> </td>';
                    echo '<td>U$' . $game->getProductPrice() . '</td>';
                    echo '<td><form method="post" action="">
                                <input type="hidden" name="productID" value=' . $game->getProductID() . '/>
                                  <input type="submit" value="Delete"/>️ 
                              </form>    
                           </td></tr>' . PHP_EOL;

                }

                ?>

            </tbody>
        </table>
    </div>

    <script src="app.js"></script>
    </body>
    </html>

