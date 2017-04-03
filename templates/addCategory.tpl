{*
Form for adding a category
*}
{extends file="layout.tpl"}

{block name="localstyle"}
    <style type="text/css">
        td:first-child{
            width: 10px;
        }
        td {
            border: none ! important;
        }
    </style>
{/block}

{block name="content"}
    <h2>Add Category</h2>
    
    <form action="addCategoryReentrant.php" method="post">
        <table class="table table-condensed">
            <tr>
                <td>
                    <h4>
                        <strong>
                            Current Categories:
                        </strong>
                    </h4>
                </td>
            <tr>
                <td>
                    {foreach $categories as $category}
                        {$category}
                        <br />
                    {/foreach}
                </td>
            </tr>
            </tr>
            <tr>
                <td>Name of Category:</td>
                <td>
                    <input class="form-control" type="text" name="name"
                           value="{$name|escape:'html'}" />
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
    </form>
{/block}