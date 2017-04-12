{*
myOrders.tpl: template used for veiwing the users the orders
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
    <h2>My Orders</h2>
    <table class="table-condensed">
        {foreach $userOrders as $order}
            <tr>
                <td>
                    <a href="showOrder.php?order_id={$order->id}">
                    Order #{$order->id|escape:'html'}:
                    </a>
                </td>
                <td><strong>Time Placed:</strong>   {$order->created_at}</td>
            </tr>
        {/foreach}
    </table>
{/block}
