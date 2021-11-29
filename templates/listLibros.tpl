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
    <h1>{$titulo}</h1>
    {if $admin eq true}
    <form action="agregarLibro" method="POST">

        <label for="libro">libro</label>
        <input id="libro" name="libro" type="text" required placeholder="Nombre">

        <label for="id_autor">Autor</label>

        <select name="id_autor" id="id_autor">

        {foreach from=$autores item=$autor }
        <option value="{$autor->id_autor}">{$autor->autor}</option>
        {{/foreach}}

        </select>

        <label for="descripcion">descripcion</label>
        <input id="descripcion" name="descripcion" type="text" required placeholder="Descripcion">

        <label for="agno">Año</label>
        <input id="agno" name="agno" type="numer" required placeholder="agno">

        <button type="submit" > Nuevo libro </button>
    </form>
    {/if}

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            {if  $admin eq true}
            <th>Acciones</th>
            {/if}
        </tr>
    {foreach from=$libros item=$libro}
        <tr>
            <td>{$libro->id}</td>
            <td><a href="libro/{$libro->id}"> {$libro->libro}</td>
            <td><a href="autor/{$libro->id_autor}"> {$libro->autor} </a></td>
            <td>{$libro->agno}</td>
            {if  $admin eq true}
            <td>
                <a href="borrarLibro/{$libro->id}"> Eliminar </a>
                <a href="formularioEditarLibro/{$libro->id}"> Editar </a>
            </td>
            {/if}
        </tr>
    {/foreach}
    </table>
</article>

{include file="templates/footer.tpl"}