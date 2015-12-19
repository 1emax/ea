<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsTags index large-9 medium-8 columns content">
    <h3><?= __('Events Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('tag_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsTags as $eventsTag): ?>
            <tr>
                <td><?= $this->Number->format($eventsTag->id) ?></td>
                <td><?= $eventsTag->has('event') ? $this->Html->link($eventsTag->event->name, ['controller' => 'Events', 'action' => 'view', $eventsTag->event->id]) : '' ?></td>
                <td><?= $eventsTag->has('tag') ? $this->Html->link($eventsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $eventsTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTag->id)]) ?>
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
