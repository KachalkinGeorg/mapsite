<form method="post" action="">
	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки Главной страницы</div>

	<table class="table table-striped">
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавлять домашнюю страницу в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="main">{{ main }}</select>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет домашней страницы:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>1.0</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="main_pr" value="{{ main_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавлять подстраницы домашней страницы в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница типа (page/1) будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="mainp">{{ mainp }}</select>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет подстраниц:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>0.5</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="main_p_pr" value="{{ main_p_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
	</table>
	
	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки Категорий</div>
	<table class="table table-striped">
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавлять страницы категорий в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница типа (категория.html) будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="cat">{{ cat }}</select>
        </td>
      </tr>
       <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет страниц категорий:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>0.7</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="cat_pr" value="{{ cat_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавлять подстраницы категорий в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница типа (категория/page/1) будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="catp">{{ catp }}</select>
        </td>
      </tr>
       <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет подстраниц категорий:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>0.7</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="catp_pr" value="{{ catp_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
	</table>

	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки Новостей</div>
	<table class="table table-striped">
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавлять страницы новостей в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="news">{{ news }}</select>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет новостей:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>0.5</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="news_pr" value="{{ news_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
	</table>

	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки Статистических страниц</div>
	<table class="table table-striped">
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Добавить статические страницы в карту сайта:</h6>
		  <span class="text-muted text-size-small hidden-xs"><b>Да</b> - страница будет добавляться в карту сайта<br /><b>Нет</b> - страница не будет добавляться в карту сайта</span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<select name="stat">{{ stat }}</select>
        </td>
      </tr>
      <tr>
        <td class="col-xs-6 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Приоритет статических страниц:</h6>
		  <span class="text-muted text-size-small hidden-xs">По умолчанию <b>0.3</b></span>
		</td>
        <td class="col-xs-6 col-sm-6 col-md-5">
			<div class="input-group">
			<input type="text" name="stat_pr" value="{{ stat_pr }}" class="form-control" style="max-width:80px; text-align: center;">
			<div class="input-group-append">
				<a class="btn btn-primary" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="ПРИОРИТЕТ" data-content="Значение выставляется от <b>0.0</b> до <b>1.0</b>" tabindex="0">
					<i class="fa fa-question"></i>
				</a>
			</div>
			</div>
        </td>
      </tr>
	</table>
	
	<div class="panel-footer" align="center">
		<button type="submit" name="submit" class="btn btn-outline-primary">Создать карту сайта</button>
		<input type="hidden" name="action" value="create">
	</div>
</form>