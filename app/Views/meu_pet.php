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
        <center>Pets Cadastrados</center>
        <br>
    </h1>

    <table>
    <tr>
    <th>Nome</th>
    <th>Tipo</th>
    <th>Raça</th>
    <th>Porte</th>
  </tr>
    <?php foreach($pet->getResultObject() as $a) : ?>
    
  
  <tr>
    <td><?= $a->nome?></td>
    <td><?= $a->tipo?></td>
    <td><?= $a->raca?></td>
    <td><?= $a->porte?></td>
  </tr>
  <?php endforeach; ?>
</table>

    
</section>