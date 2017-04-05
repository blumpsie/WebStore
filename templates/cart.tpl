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
                <td>${$value['price']}</td>
                <td>{$value['quantity']}</td>
            {/foreach}
        </tr>
        
    </table>

{/block}
