<h1>Register</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('address') ?>
<?= $this->Form->control('telphone') ?>
<?= $this->Form->button('Register') ?>
<?= $this->Form->end() ?>
