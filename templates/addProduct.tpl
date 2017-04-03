{*
addProduct.tpl: Form for adding a product
*}
{extends file="layout.tpl"}

{block name="localstyle"}
    <style type="text/css">
        td:first-child {
            width: px;
        }
        td {
            border: none ! important;
        }
    </style>
{/block}

{block name="content"}
    <h2>Add Product</h2>
    
    <form action="addProductReentrant.php" method="post">
        <table class="table table-condensed">
            <tr>
                <td>Name:</td>
                <td>
                    <input class="form-control" type="text" name="name"
                           value="{$name|escape:'html'}" />
                </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select class="form-control" name="category">
                        {html_options options=$categories selected=$category}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Price ($):</td>
                <td>
                    <input class="form-control" type="text" name="price"
                           value="{$price|escape:'html'}" />
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" rows='10' cols='50'
                              value="{$description|escape:'html'}">
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Photo:</td>
                <td>
                    <select class="form-control" name="photo">
                        {html_options options=$photos selected=$photo}
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="addit">Add</button>
                    <button type="submit" name="cancel">Cancel</button>
                </td>
            </tr>
        </table>
                        <h4 id="message">{$message|default}</h4>
    </form>
{/block}