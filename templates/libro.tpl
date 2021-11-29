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


<article>
  <h2>{$libro->libro}</h2>
  <ul >
    <li>{$libro->agno}</li>

    <li><a href="autor/{$autor->id_autor}"> {$autor->autor} </a></li>

  </ul>
  <p>{$libro->descripcion}</p>
</article>

<div id="aplicacion" data-id-libro="{$libro->id}"  >
  <div id="dataUsuario" data-usuario="{$usuario}">

  {if $usuario}
    <form id="form-comment" method="POST">
        <h3 >Comentar sobre el producto</h3>

        <input type="text" name="content" id="content" placeholder="Ingrese comentario sobre el producto">

        <label for="valoracion"></label>

        <select name="valoracion" id="valoracion">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input type="button" id="btn_comment" value="Comentar">

    </form>
  {/if}
  </div>
  
  <div id="dataAdmin" data-admin="{$admin}">
    {literal}
    <table>
      <tr >
          <tH> Usuario</th>
          <th> Comentario</th>
          <th> Valoracion</th>
          <th v-if="is_admin"> Acciones</th>
      </tr>

      <tr v-for="comment in comentarios">

          <td>{{ comment.usuario }}</td>
          <td>{{ comment.comentario }}</td>
          <td>{{ comment.valoracion }} puntos</td>
          <td v-if="is_admin">
          <button v-on:click="deleteComment(comment.id_comment)" >Eliminar</button>
          </td>
          
      </tr>
    </table>
    {/literal}
  </div>


</div>

{include file="templates/footer.tpl"}