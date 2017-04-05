{* productSelect.tpl *}

{extends file="layout.tpl"}

{block name="localstyle"}
  <style>
    .product img { 
      float: right; 
    }
    .product ul {
      padding-left: 20px;
    }
  </style>
{/block}

{block name="content"}
  <h2>{$product->name|escape:'html'}</h2>

  <p>
    Product id: {$product->id}
    <br />
    Price: <b>${number_format($product->price,2)}</b>
  </p>

  <div class="product">
    {if $product->photo->id != 0}
      <img class="img-responsive" src="img/products/{$product->photo->name}" />
    {/if}
    {$product->description}
  </div>

  <div class="action">
    {if not $session->login or not $session->login->is_admin}
        <form action="cart.php" method="get">
          <b>Selected quantity</b>
          <br />
          <select>
              {html_options options=$quantity}
          </select>
          <button type="submit">Change Quantity</button>
        </form>
    {else}
        <form action="modifyProduct.php" method="get">
            <input type="hidden" name="product_id" value="{$product->id}" />
            <button type="submit">Modify</button>
        </form>
        
        <form action="removeProduct.php" method="get">
            <input type='hidden' name='product_id' value="{$product->id}" />
            <button type="submit">
                {{session_get_flash var='button_title'}|default:'Remove'}
            </button>
            <input type='hidden' name='confirm'
                   value='{session_get_flash var='confirm'}' />
        </form>
    {/if}
  </div>

  <h4 id='message'>
    {session_get_flash var='message'}    
  </h4>

{/block}
