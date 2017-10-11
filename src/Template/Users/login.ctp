<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('user_email') ?>
<?= $this->Form->control('user_password',['type' => 'password'])?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
