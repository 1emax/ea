<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsRooms index large-9 medium-8 columns content">
    <h3><?= __('Events Rooms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('room_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsRooms as $eventsRoom): ?>
            <tr>
                <td><?= $this->Number->format($eventsRoom->id) ?></td>
                <td><?= $eventsRoom->has('event') ? $this->Html->link($eventsRoom->event->name, ['controller' => 'Events', 'action' => 'view', $eventsRoom->event->id]) : '' ?></td>
                <td><?= $eventsRoom->has('room') ? $this->Html->link($eventsRoom->room->name, ['controller' => 'Rooms', 'action' => 'view', $eventsRoom->room->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsRoom->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsRoom->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRoom->id)]) ?>
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
