<?php $this->assign('title', $event->name); ?>
<div class="events show large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($event->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Place') ?></th>
            <td><?= $event->has('place') ? $this->Html->link($event->place->name, ['controller' => 'Places', 'action' => 'view', $event->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($event->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Date') ?></th>
            <td><?= h($event->event_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($event->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Template Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Place Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= h($room->id) ?></td>
                <td><?= h($room->name) ?></td>
                <td><?= h($room->template_name) ?></td>
                <td><?= h($room->description) ?></td>
                <td><?= h($room->place_id) ?></td>
                <td><?= h($room->created) ?></td>
                <td><?= h($room->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $room->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $room->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="rooms-conteiner" data-event-id="<?=$event->id?>">
            <?php


            $this->Html->css([
            	'room', 
            	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', 
            	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css'],
            	 ['block' => true]
           	);
            $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', ['block' => true]);
            $this->Html->script('room', ['block' => true]);

            foreach ($rooms as $room):
            ?>
        	<div class="room-content">
	        	<? 
	            echo $this->Room->loadTemplate($room, __DIR__ . '/../Rooms');
	        	?>
        	</div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</div>

