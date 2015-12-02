<?php /*
Шаблон редактируемой страницы
==============================
$articles - список статей

статья
id_article - идентифицатор
title - заголовок
content - текст
*/

?>
<b><a href="index.php?c=editor&act=new">Новая статья</a></b>
<table>
		<tr>
				<td width="40%">
					<?php echo $text?>...
				</td>
				<td>
					<a href="index.php?c=editor&act=show">Просмотр</a>
				</td>
				<td>
					<a href="index.php?c=editor&act=del">Удалить</a>
				</td>
				<td>
					<a href="index.php?c=editor&act=edit">Редактировать</a>
				</td>
			</tr>
</table>
