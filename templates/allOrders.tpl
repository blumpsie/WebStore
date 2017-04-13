{*
allOrders.tpl: template used for veiwing all the orders
Author: Mark Erickson
*}
{extends file="layout.tpl"}

{block name="localstyle"}
    <style type="text/css">
        td:first-child{
            width: 10px;
        }
        td{
            border: none ! important;
        }
    </style>
{/block}

{block name="content"}
    <h2>All Orders</h2>
    <table class="table-condensed">
        {foreach $orders as $order}
            <tr>
                <td>
                    <a href="showOrder.php?order_id={$order->id}">
                    Order #{$order->id}
                    </a>
                </td>
                <td>Time Placed:{$order->created_at}</td>
                <td>for:{$order->user->name}</td>
            </tr>
        {/foreach}
    </table>
    <h4 id='message'>
         {session_get_flash var='message'}    
    </h4>
{/block}