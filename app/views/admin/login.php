<div>
    <form action="<?php echo URL_BASE?>login/autenticar" method="post">
        <h2>Login</h2>
        <label for="inputEmail">Email</label>
        <input type="email" name="email" id="email" placeholder="Email address" required autofocus>
        <label for="inputPassword">Senha</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Logar</button>
    </form>
</div>