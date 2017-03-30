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
    <form>
      <b>Selected quantity</b>
      <br />
      <select>
          {html_options options=$quantity}
      </select>
      <button type="submit">Change Quantity</button>
    </form>
  </div>

  <h4 id='message'>
    {session_get_flash var='message'}    
  </h4>

{/block}
