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
<b><a href="new.php">Новая статья</a></b>
<table>
	<?php foreach ($articles_all as $article): ?>
		<?php for($i=0; $i<count($article); $i++): ?>
			<tr>
				<td width="40%">
					<?php echo $article["$i"]['name'] ?>
				</td>
				<td>
					<a href="index.php?c=editor&act=show&id=<?php echo $article["$i"]['id']?>">Просмотр</a>
				</td>
				<td>
					<a href="delete.php?id=<?php echo $article["$i"]['id']?>">Удалить</a>
				</td>
				<td>
					<a href="edit.php?id=<?php echo $article["$i"]['id'] ?>">Редактировать</a>
				</td>
			</tr>
		<?php endfor ?>
	<?php endforeach ?>
</table>
