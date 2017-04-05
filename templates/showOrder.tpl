{*
showOrder.tpl: used for displaying an order
Author: Mark Erickson
*}

{extends file="layout.tpl"}

{block name="localstyle"}
    <style type="text/css">
        .top { 
      margin-bottom: 20px; 
    }
    .top h2 { 
      display: inline-block;
      margin: 0 30px 0 0;
      vertical-align: bottom;
    }
    .top form {
      display: inline-block;
      vertical-align: bottom;
    }
    </style>
{/block}

{block name="content"}
    <div class="top">
        <h2>Order #{$order->id}</h2>
        {if $session->login->is_admin}
        <br />
        <br />
        User:{$order->user->name}
        <br />
        Email:{$order->user->email}
        {/if}
    </div>
        
    <table class="table table-hover table-condensed">
        <tr>
            <td>Name</td>
            <td>Id</td>
            <td>Category</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        {foreach $selections as $selection}
            <tr>
                <td><a href="productSelect.php?product_id={$selection->product->id}">
                {$selection->product->name|escape:'html'}
                </td>
                <td>{$selection->product->id|escape:'html'}</td>
                <td>{$selection->product->category->name|escape:'html'}</td>
                <td>${$selection->product->price|escape:'html'}</td>
                <td>{$selection->quantity}</td>
                <td>${$subtotals[$selection->id]|escape:'html'}</td>
            </tr>
        {/foreach}
        <tr>
            <td>Total:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>${$total}</td>
        </tr>
    </table>
    
    {if $session->login->is_admin}
    <div class='action'>
        <form action='removeOrder.php' method='get'>
            <input type='hidden' name='order_id' value='{$order->id}'>
            <button type='submit'>
                {{session_get_flash var='button_title'}|default:'Remove'}
            </button>
            <input type='hidden' name='confirm'
                   value='{session_get_flash var='confirm'}' />
        </form>
    </div>
    {/if}
{/block}