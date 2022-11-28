<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Cãonil</label>
    <ul>
        <li><a href="inicio">Início</a></li>
        <li><a href="buscar">Buscar Pet</a></li>
        <li><a class="active" href="cadastro_pet">cadastro</a></li>
        <li><a href="login">Login</a></li>
        <li><a href="minha_conta">Minha conta</a></li>
        <li><a href="sobre">Sobre</a></li>

    </ul>
</nav>
<section>
    <div>
        <form action="pet_submit" method="post">
            <h1>Cadastro de Pet</h1>
            <label class="">Nome do Pet:
                <input type="text" name="nome" placeholder="nome do seu animalzinho">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('nome', $validation_errors) ?></small></span>
                <?php endif; ?>
            </label>

            <label class="">Tipo:
                <input type="text" name="tipo" placeholder="ex: cachorro, gato...">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('tipo', $validation_errors) ?></small></span>
                <?php endif; ?>
            </label>

            <label class="">Porte:
                <input type="text" name="porte" placeholder="insira o porte do animal">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('porte', $validation_errors) ?></small></span>
                <?php endif; ?>
            </label>

            <label class="">Raça:
                <input type="text" name="raca" placeholder="insira a raça do Pet">
                <?php if (!empty($validation_errors)) : ?>
                    <span><small><?= show_form_errors('raca', $validation_errors) ?></small></span>
                <?php endif; ?>
            </label>


            <br><br>
            <button class="btn btn-outline-light text-center" type="submit">Cadastrar</button>
        </form>
    </div>
</section>