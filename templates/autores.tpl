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


<article >
    <h1>Lista de Autores</h1>
    {if $admin eq true}
<form action="agregarAutor" method="POST">
    <label for="autor">autor</label>
    <input id="autor" name="autor" type="text" required placeholder="Nombre">

    <label for="biografia">biografia</label>
    <input id="biografia" name="biografia" type="text" required placeholder="Biografia">

    <button type="submit">Agregar autor</button>
<form>
    {/if}
    

    <table>
        <tr>
            <th>ID</th>

            <th>Autor</th>

            {if  $admin eq true}
            <th>Acciones</th>
            {/if}
        </tr>
    {foreach from=$autores item=$autor}
        <tr>
            <td>{$autor->id_autor}</td>

            <td><a href="autor/{$autor->id_autor}"> {$autor->autor} </a></td>

            {if  $admin eq true}
            <td>
                <a href="{BASE_URL}borrarAutor/{$autor->id_autor}"> Eliminar </a>
                <a href="{BASE_URL}formularioEditarAutor/{$autor->id_autor}"> Editar </a>
            </td>
            {/if}
        </tr>
    {/foreach}
    </table>
</article>

{include file="templates/footer.tpl"}