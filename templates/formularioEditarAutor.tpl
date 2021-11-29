{include file="templates/header.tpl"}

<form action="{BASE_URL}editarAutor/{$autor->id_autor}" method="POST">
    <label for="autor">Autor</label>
    <input id="autor" name="autor" type="text" placeholder="Nombre" value="{$autor->autor}" required>

    <label for="biografia"> Biografia</label>
    <input id="biografia" name="biografia" type="text" placeholder="Biografia" value="{$autor->biografia}" required>

    <button type="submit">Editar autor</button>
<form>

<h1> Volver a <a href="{BASE_URL}home">Libros</a></h1>
{include file="templates/footer.tpl"}