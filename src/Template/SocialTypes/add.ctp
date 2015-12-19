<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Social Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Socials'), ['controller' => 'Socials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Social'), ['controller' => 'Socials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socialTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($socialType) ?>
    <fieldset>
        <legend><?= __('Add Social Type') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
