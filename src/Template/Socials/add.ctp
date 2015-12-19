<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Socials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Social Types'), ['controller' => 'SocialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Social Type'), ['controller' => 'SocialTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socials form large-9 medium-8 columns content">
    <?= $this->Form->create($social) ?>
    <fieldset>
        <legend><?= __('Add Social') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('net_id');
            echo $this->Form->input('social_type_id', ['options' => $socialTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
