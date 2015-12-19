<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Social Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Socials'), ['controller' => 'Socials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Social'), ['controller' => 'Socials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="socialTypes index large-9 medium-8 columns content">
    <h3><?= __('Social Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($socialTypes as $socialType): ?>
            <tr>
                <td><?= $this->Number->format($socialType->id) ?></td>
                <td><?= h($socialType->name) ?></td>
                <td><?= h($socialType->created) ?></td>
                <td><?= h($socialType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $socialType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialType->id)]) ?>
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
