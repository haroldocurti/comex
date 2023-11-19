<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
global $clientsRepository, $dao, $shoppingCart;
if ($_SESSION['clients']== null) {
    $_SESSION['clients'] = $clientsRepository->allClients($dao->fetchAllClients());
}
$clients = $_SESSION['clients'];

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Clients Information </title>

    </head>
    <body>
    <div class="top-bar">
        <nav>
            <ul>
                <li><a href="products.php">Products Management</a></li>
                <li><a href="clients.php">Client</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h2>Client Management</h2>
        <h3>Add a new client? <a href="client_form.php">Click here</a></h3>

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>CPF</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($clients as $client) {
                echo '<tr>
              <td>' . $client->getName() . '</td>
              <td>' . $client->getCpf() . '</td>
              <td>' . $client->getPhoneNumber() . '</td>
              <td>
                  <form method="post" action="delete_client.php"> <!-- Assuming the action is delete_client.php, please replace it with the actual file -->
                      <input type="hidden" name="clientID" value=' . $client->getClientId() . ' />
                      <input type="submit" value="Delete"/>
                  </form>    
               </td>
          </tr>';
            }
            ?>

            </tbody>
        </table>
    </div>

    <script src="app.js"></script>
    </body>
    </html>


