<form action="<?php e($this->Config->get('app.url')) ?>/admin/create" method="post">
<input type="text" name="" id="">
<?php echo $this->CSRF; ?>
<input type="submit" value="Send">
</form>