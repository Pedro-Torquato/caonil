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
        <li><a href="login">Login</a></li>
        <li><a class="active" href="minha_conta">Minha conta</a></li>
        <li><a href="sobre">Sobre</a></li>

    </ul>
</nav>
<section>
    <br>
    <h1>
        <center>Minha Conta, <a href="logout">Sair</a> </center>
        
        
    </h1>
    <br>
    <section class="row">
        <section class="card">
            <a href="cadastro_pet">
                <img src="<?= base_url('img/cadastrar pet.png') ?>" >
            </a>
            <h1>Cadastrar um novo PET</h1>
        </section>
        <section class="card">
            <a href="meu_pet">
                <img src="<?= base_url('img/pets_cadastrados.png') ?>" >
            </a>
            <h1>PETS cadastrados</h1>
        </section>
    </section>
</section>