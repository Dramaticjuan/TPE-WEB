{include file="templates/header.tpl"}

<form action="registrar" method="POST">

    <label for="email">Email</label>
    <input id="email" name="email" type="text" required placeholder="Nombre">

    <label for="password">Clave</label>
    <input id="password" name="password" type="password" required placeholder="Clave">
    
    {if $mensaje != ""}
    <h1> {$mensaje}</h1>
    {/if}

    <button type="submit" value="login">
    Confirmar
    </button>

</form>
<h1> Volver a <a href="{BASE_URL}home">home</a></h1>
<h1> Si ya tienens cuenta, <a href="{BASE_URL}showLogin">accede desde aqui</a></h1>



{include file="templates/footer.tpl"}