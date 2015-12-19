<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket'), ['action' => 'edit', $ticket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tickets view large-9 medium-8 columns content">
    <h3><?= h($ticket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $ticket->has('user') ? $this->Html->link($ticket->user->id, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Seat Name') ?></th>
            <td><?= h($ticket->seat_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $ticket->has('event') ? $this->Html->link($ticket->event->name, ['controller' => 'Events', 'action' => 'view', $ticket->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticket->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($ticket->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($ticket->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Seat Status') ?></h4>
        <?= $this->Text->autoParagraph(h($seat_status[$ticket->seat_status])); ?>
    </div>
</div>
