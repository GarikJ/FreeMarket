{foreach $rsProduct as $item name=product}
<!--<meta http-equiv="refresh" content="2"> можно добавить функцию удалить/добавить в кнопку и там же прикрутить обновление страницы--> 
<h3>{$item['name']}</h3>

<img width="575" src="/images/products/{$item['image']}">
<div> Стоимость: {$item['price']} </div>

<a id="removeCart_{$item['id']}" {if ! $itemInCart} class="hideme"{/if} href="#" onClick= "removeFromCart({$item['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_{$item['id']}" {if $itemInCart} class="hideme"{/if} href="#" onClick="addToCart({$item['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>
<p> Описание <br /> </p>{$item['description']}

{/foreach}
