{include file="templates/header.tpl"}

<header>

      {if $usuario }
      <h3>Logueado como: {$usuario}</h3>
      <a href="{BASE_URL}logout" class="btn">Logout</a>
      {else}
      <a href="{BASE_URL}showLogin" class="btn">Log in</a>
      <a href="{BASE_URL}showRegistrar" class="btn">Registrarse</a>
      {/if}
  <nav >
  
      <a href="{BASE_URL}home">Libros</a>
    ·
      <a href="{BASE_URL}autores">Autores</a>

      {if $admin eq true}
    ·
      <a  href="{BASE_URL}usuarios">Usuarios</a>
      {/if}
  </nav>
</header>
<section>
  <table>
    <tr>
        <th>Usuarios</th>
        <th>Acciones</th>
    </tr>
  {foreach from=$users item=$user}
    <tr>
      <td> {$user->email} </td>
      <td>
        <a href="{BASE_URL}borrarUsuario/{$user->id_usuario}"> Eliminar Usuario </a>
        {if $user->admin eq 0}
        ·
        <a href="{BASE_URL}hacerAdmin/{$user->id_usuario}"> Hacer admin </a>
        {/if}
      </td>

    </tr>
  {/foreach}

  </table>

</section>




{include file="templates/footer.tpl"}