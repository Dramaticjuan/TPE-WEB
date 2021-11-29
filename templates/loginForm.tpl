{include file="templates/header.tpl"}

<form action="login" method="POST">


    <label for="email">Nombre</label>
    <input id="email" name="email" type="text" required placeholder="Email">
    
    <label for="password">Clave</label>
    <input id="password" name="password" type="password" required placeholder="Clave">
    {if $mensaje != ""}
    <h1> {$mensaje}</h1>
    {/if}
    <button type="submit" value="login">Iniciar</button>

</form>

<h1> Volver a <a href="{BASE_URL}home">home</a></h1>
<h1> Si no tienens cuenta, <a href="{BASE_URL}showRegistrar">registrate aquí</a></h1>


{include file="templates/footer.tpl"}