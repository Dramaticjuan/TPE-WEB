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

<h1>{$autor->autor}</h1>
<p>{$autor->biografia}</p>
<h2> Lista de sus libros </h2>
<table>
    <tr>
        <th>Título</th>
        <th>Año</th>
    </tr>
{foreach from=$libros item=$libro}
    <tr>
        <td><a href="libro/{$libro->id}"> {$libro->libro} </a></td>
        <td>{$libro->agno}</td>
    </tr>
{/foreach}
</table>


{include file="templates/footer.tpl"}