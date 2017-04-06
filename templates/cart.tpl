{extends file="layout.tpl"}

{block name="localstyle"}
    <style type="text/css">
        .top{
            margin-bottom: 20px;
        }
        .top h2{
            display: inline-block;
            margin: 0 30px 0 0;
            vertical-align: bottom;
        }
        .top form{
            display: inline-block;
            vertical-align: bottom;
        }
    </style>
{/block}

{block name="content"}

<div class="top">
    <h2>My Cart</h2>
    {foreach $session->cart as $key => $value}
        <br />
        {$key}  => {$value}
    {/foreach}
</div>
    
    <table class="table table-hover table-condensed">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Per-Product Subtotal</th>
        </tr>
        <tr>
            {foreach $cart_info as $key => $value}
                <td><a href="productSelect.php?product_id={$key}">{$value['name']}</a></td> 
                <td>${number_format($value['price'], 2, ".","")}</td>
                <td>{$value['quantity']}</td>
                <td>${number_format($value['subtotal'], 2, ".", "")}</td>
            {/foreach}
        </tr>
        <tr>
            <td>Total:</td>
            <td></td>
            <td></td>
            <td>${number_format($total, 2, ".", "")}</td>
        </tr>
        {if $session->login}
        <tr>
            <td>
                <form action="placeOrder.php">
                    <button type="submit">Place Order</button>
                </form>
            </td>
        </tr>
        {/if}
    </table>

{/block}
