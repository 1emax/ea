<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Social'), ['action' => 'edit', $social->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Social'), ['action' => 'delete', $social->id], ['confirm' => __('Are you sure you want to delete # {0}?', $social->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Socials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Social Types'), ['controller' => 'SocialTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social Type'), ['controller' => 'SocialTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="socials view large-9 medium-8 columns content">
    <h3><?= h($social->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $social->has('user') ? $this->Html->link($social->user->id, ['controller' => 'Users', 'action' => 'view', $social->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Social Type') ?></th>
            <td><?= $social->has('social_type') ? $this->Html->link($social->social_type->name, ['controller' => 'SocialTypes', 'action' => 'view', $social->social_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($social->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Net Id') ?></th>
            <td><?= $this->Number->format($social->net_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($social->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($social->modified) ?></td>
        </tr>
    </table>
</div>
