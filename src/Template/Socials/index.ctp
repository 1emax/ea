<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Social'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Social Types'), ['controller' => 'SocialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Social Type'), ['controller' => 'SocialTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socials index large-9 medium-8 columns content">
    <h3><?= __('Socials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('id_network') ?></th>
                <th><?= $this->Paginator->sort('social_type_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($socials as $social): ?>
            <tr>
                <td><?= $this->Number->format($social->id) ?></td>
                <td><?= $social->has('user') ? $this->Html->link($social->user->id, ['controller' => 'Users', 'action' => 'view', $social->user->id]) : '' ?></td>
                <td><?= h($social->id_network) ?></td>
                <td><?= $social->has('social_type') ? $this->Html->link($social->social_type->name, ['controller' => 'SocialTypes', 'action' => 'view', $social->social_type->id]) : '' ?></td>
                <td><?= h($social->created) ?></td>
                <td><?= h($social->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $social->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $social->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $social->id], ['confirm' => __('Are you sure you want to delete # {0}?', $social->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
