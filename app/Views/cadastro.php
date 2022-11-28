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
	<div class="cadastro container row text-center m-4" style="width: 40em;">
		<form action="cadastro_submit" method="post">
			<h1 class="text-center">Cadastre-se</h1>
			
			<label class="col-5 m-3">Nome:
				<input type="text" name="nome" placeholder="digite seu primeiro nome">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('nome', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<label class="col-5 m-3">Sobrenome:
				<input type="text" name="sobrenome" placeholder="digite seu sobrenome">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('sobrenome', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<label class="col-5 m-3">E-mail:
				<input type="text" name="email" placeholder="digite seu e-mail">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('email', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<label class="col-5 m-3">Celular:
				<input type="text" name="celular" placeholder="digite seu celular com DDD">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('celular', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<label class="col-5 m-3">Senha:
				<input type="password" name="senha"  placeholder="digite sua senha">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('senha', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<label class="col-5 m-3">Confirme sua senha:
				<input type="password" name="confirm_senha" placeholder="digite sua senha novamente">
				<?php if (!empty($validation_errors)) : ?>
					<span><small><?= show_form_errors('confirm_senha', $validation_errors) ?></small></span>
				<?php endif; ?>
			</label>

			<br><br>
			<button class="btn btn-outline-light text-center" type="submit">Enviar</button>
		</form>

	</div>
</section>