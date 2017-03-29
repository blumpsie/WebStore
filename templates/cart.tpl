{extends file="layout.tpl"}

{block name="content"}

<h2>My Cart</h2>

<pre>
{print_r($cart_info,true)}  {* a simple dump to see what you're getting *}

total = {$total_price}
</pre>

{/block}
