{include file="templates/header.tpl"}
<h1>que pasa aca</h1>

<form action="{BASE_URL}editarLibro/{$libro->id}" method="POST">
    <label >Libro</label>
    <input id="libro" name="libro" type="text" placeholder="Nombre" value="{$libro->libro}" required>

    <label >Autor</label>
    <select id="id_autor" name="id_autor" type="number" required>

    {foreach from=$autores item=$autor }

    {if $autor->id_autor eq $libro->id_autor}
        <option selected="selected" value="{$autor->id_autor}">{$autor->autor}</option>
    {else}
    <option value="{$autor->id_autor}">{$autor->autor}</option>
    {/if}

    {/foreach}

    </select>

    <label for="descripcion">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion" value="{$libro->descripcion}" required>

    <label for="agno">Año</label>
    <input id="agno" name="agno" type="number" value="{$libro->agno}" placeholder="año" required>

    <button type="submit" name="editar">Editar libro</button>
</form>


<h1> Volver a <a href="{BASE_URL}home">Libros</a></h1>

{include file="templates/footer.tpl"}