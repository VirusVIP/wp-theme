<?php // Ничего тут не удаляйте!
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // если установлен пароль
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // и он не совпадает с cookie
?>

<h2><?php _e('Защищено Паролем'); ?></h2>
<p><?php _e('Введите пароль чтобы отобразить комментарии.'); ?></p>

<?php return;
	}
}

$oddcomment = 'alt';

?>

<!-- Отсюда можно начинать редактировать. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Нет комментариев', 'Один комментарий', '% комментариев' );?> к &#8220;<?php the_title(); ?>&#8221;</h3>

<ol class="commentlist">
<?php foreach ($comments as $comment) : ?>

	<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">

<div class="commentmetadata">
<strong><?php comment_author_link() ?></strong>, <?php _e('on'); ?> <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at');?> <?php comment_time() ?></a> <?php _e('Сказал&#58;'); ?> <?php edit_comment_link('Редактировать','',''); ?>
 		<?php if ($comment->comment_approved == '0') : ?>
		<em><?php _e('Ваш комментарий ожидает модерации.'); ?></em>
 		<?php endif; ?>
</div>

<?php comment_text() ?>
	</li>

<?php 
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>

<?php endforeach; ?>
	</ol>

<?php else : // это отображается, если пока нет комментариев ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- Если комментарии открыты, но их нет. -->
	<?php else : // comments are closed ?>

	<!-- Если комментарии закрыты. -->
<p class="nocomments">Комментарии запрещены.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

		<h3 id="respond">Оставить комментарий</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">авторизироваться</a> чтобы оставлять комментарии.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Выйти из этого аккаунта">Выйти &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
<label for="author"><small>Имя <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
<label for="email"><small>Еmail (will not be published) <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" />
<label for="url"><small>Сайт</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Отправить" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>