<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Cãonil</label>
    <ul>
        <li><a href="inicio">Início</a></li>
        <li><a class="active" href="buscar">Buscar Pet</a></li>
        <li><a href="cadastro_pet">cadastro</a></li>
        <li><a href="login">Login</a></li>
        <li><a href="minha_conta">Minha conta</a></li>
        <li><a href="sobre">Sobre</a></li>

    </ul>
</nav>
<section class="wrap">


    <h1>
        <center>BUSCAR UM PET DISPONÍVEL PARA ADOTAR!</center>
    </h1>
    <br>
    <form action="" method="get">
        <section class="search">
            <input type="text" class="searchTerm" name="buscar" placeholder="Pesquisar Pet: Ex: Nome, Raça, Porte..." required>
            <button type="submit" class="searchButton">
                <img src="<?= base_url('img/search.png') ?>">
            </button>
        </section>
    </form>

    <?php
    if (!empty($_GET)){
    $num = $resultado->getNumRows();
    if ($num == 0) {
    ?>
        <br>
        <h4>Não há resultados para essa busca...</h4>

    <?php } else { ?>
        <br> <br>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Raça</th>
                    <th>Tipo</th>
                    <th>Porte</th>
                </tr>

                <br>
            </thead>

            <?php foreach ($resultado->getResultObject() as $a) : ?>
                <tbody>
                    <tr>
                        <td><?= $a->nome ?></td>
                        <td><?= $a->tipo ?></td>
                        <td><?= $a->porte ?></td>
                        <td><?= $a->raca ?></td>
                    </tr>

                </tbody>
        <?php endforeach;}
        } ?>

        </table>




</section>