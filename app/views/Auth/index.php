<?php if(isset($_SESSION['empty_row'])):?>
	<h4><?=$_SESSION['empty_row'] ?></h4>
	<?php unset($_SESSION['empty_row']); ?>
<?php endif; ?>

<div id="auth">
	<h2>Вход</h2>
</div>
<div id="reg-title">
	<h2>Регистрация</h2>
</div>
<!-- start form auth -->
<div class="bg">
	<form action="/auth/handler/" method="post">
		<label>E-mail пользователя: </label>
		<input type="email" name="email"  placeholder="you e-mail" />
		<label>Пароль пользователя: </label>
		<input type="password" name="password" placeholder="you password" />
		<button type="submit" name="done-auth">Войти</button>
	</form>
</div>
<!-- end form for auth -->
<!-- start form for reg-->
<div class="reg">
	<form action="/auth/handler/" method="post">
		<label>E-mail пользователя: </label>
		<input type="email" name="email"  placeholder="you e-mail" />
		<label>Пароль пользователя: </label>
		<input type="password" name="password" placeholder="you password" />
		<button type="submit" name="done-reg">Зарегистрироваться</button>
	</form>
</div>