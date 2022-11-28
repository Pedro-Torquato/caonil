<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Cãonil</label>
    <ul>
        <li><a href="inicio">Início</a></li>
        <li><a href="buscar">Buscar Pet</a></li>
        <li><a href="cadastro_pet">cadastro</a></li>
        <li><a class="active" href="login">Login</a></li>
        <li><a href="minha_conta">Minha conta</a></li>
        <li><a href="sobre">Sobre</a></li>

    </ul>
</nav>
<section>

    <form action="login_submit" method="post">
        <div>
            <h1>Entre com a sua Conta</h1>
            <br>

            

            <br>
            
            <center>
                <input type="text" name="email" placeholder="Email">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('email', $validation_errors) ?></small></span>
                <?php endif; ?>
                <?php if (!empty($login_error)) : ?>
                <span><small><?= show_form_errors('email', $login_error) ?></small></span>
            <?php endif; ?>
            </center>
            <br>

            <center>
                <input type="password" name="senha" placeholder="Senha">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('senha', $validation_errors) ?></small></span>
                <?php endif; ?>
            </center>



            <br><br>

            
 


            <span>Não possui acesso? <a href="cadastro">Cadastre-se</a></span>
            <br>
            <button class="btn btn-outline-light text-center mt-4" type="submit">Enviar</button>

        </div>
    </form>

</section>