<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Tag'), ['action' => 'edit', $eventsTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Tag'), ['action' => 'delete', $eventsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsTags view large-9 medium-8 columns content">
    <h3><?= h($eventsTag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventsTag->has('event') ? $this->Html->link($eventsTag->event->name, ['controller' => 'Events', 'action' => 'view', $eventsTag->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= $eventsTag->has('tag') ? $this->Html->link($eventsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $eventsTag->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventsTag->id) ?></td>
        </tr>
    </table>
</div>
