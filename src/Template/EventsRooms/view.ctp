<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Room'), ['action' => 'edit', $eventsRoom->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Room'), ['action' => 'delete', $eventsRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRoom->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsRooms view large-9 medium-8 columns content">
    <h3><?= h($eventsRoom->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventsRoom->has('event') ? $this->Html->link($eventsRoom->event->name, ['controller' => 'Events', 'action' => 'view', $eventsRoom->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $eventsRoom->has('room') ? $this->Html->link($eventsRoom->room->name, ['controller' => 'Rooms', 'action' => 'view', $eventsRoom->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventsRoom->id) ?></td>
        </tr>
    </table>
</div>
