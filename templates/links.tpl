{if $session->login and !$session->login->is_admin}
    <li><a href="cart.php">Cart</a></li>
    <li><a href="myOrders.php">My Orders</a></li>
{/if}

{if $session->login and $session->login->is_admin}
    <li><a href="allOrders.php">All Orders</a></li>
    <li><a href="addProduct.php">Add Product</a></li>
    <li><a href="addCategory.php">Add Category</a></li>
{/if}

{if $session->login}
    <li><a href="logout.php">Logout</a></li>
{else}
<li><a href="cart.php">Cart</a></li>
<li><a href="login.php">Login</a></li>
{/if}