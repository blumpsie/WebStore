{*
login.tpl: login form
*}

{extends file="layout.tpl"}

{block name="localstyle"}
  <style>
    th {
      width: 10px;
    }
    th, td {
      border: none ! important;
    }
  </style>
{/block}

{block name="content"}
  <h2>Login</h2>

  <p>Please enter access information</p>
  
  <form action="validate.php" method="post" autocomplete="off">
    <table class="table table-condensed">
      <tr>
        <th>user:</th>
        <td><input class="form-control" type="text" name="username" autofocus="on"
                   value="{{session_get_flash var='username'}|escape:'html'}" /></td>
      </tr>
      <tr>
        <th>password:</th>
        <td><input class="form-control" type="password" name="password" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">Access</button></td>
      </tr>
    </table>

  </form>

  <h4 id="message">{session_get_flash var='message'}</h4>
{/block}
