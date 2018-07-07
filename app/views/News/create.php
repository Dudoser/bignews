<form method="post" action="/news/create/">
	<div class="control-group">
		<label class="control-label" for="input01">Заголовок</label>
		<div class="controls">
			<input type="text" class="input-xlarge" id="input01">
			<p class="help-block"></p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="optionsCheckbox">Флажок</label>
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox" id="optionsCheckbox" value="option1">
				Поместить новость в раздел "аналитика"
			</label>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="select01">Выпадающий список категорий</label>
		<div class="controls">
			<select id="select01">
				<option>Выберите</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="multiSelect">Множественный выбор тегов</label>
		<div class="controls">
			<select multiple="multiple" id="multiSelect">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="fileInput">картинка</label>
		<div class="controls">
			<input class="input-file" id="fileInput" type="file">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="textarea">Многострочный текст новости</label>
		<div class="controls">
			<textarea class="input-xlarge" id="textarea" rows="6" cols="80"></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" name="save-news" class="btn btn-primary">Сохранить</button>
	</div>
</form>