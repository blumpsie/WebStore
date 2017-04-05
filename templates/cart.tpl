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
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Per-Product Subtotal</th>
        </tr>
        
    </table>

{/block}
