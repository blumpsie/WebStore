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

  <div class='top'>
    <h2>Products</h2>
    <form>
      <button type="submit">Filter by Category:</button>
      <select></select>
    </form>
  </div>

  <table class="table table-hover table-condensed">
    <tr>
      <th><a href="">name</a></th>
      <th>category</th>
      <th class="price"><a href="">price</a></th>
    </tr>
    {foreach $products as $product}
      <tr>
        <td>
          <a href="productSelect.php?product_id={$product->id}">
            {$product->name|escape:'html'}
          </a>
        </td>
        <td>{$product->category->name}</td>
        <td class="price">${number_format($product->price,2)}</td>
      </tr>
    {/foreach}
  </table>

{/block}
