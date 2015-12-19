<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Social Type'), ['action' => 'edit', $socialType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Social Type'), ['action' => 'delete', $socialType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Social Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Socials'), ['controller' => 'Socials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Social'), ['controller' => 'Socials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="socialTypes view large-9 medium-8 columns content">
    <h3><?= h($socialType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($socialType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($socialType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($socialType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($socialType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Socials') ?></h4>
        <?php if (!empty($socialType->socials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Net Id') ?></th>
                <th><?= __('Social Type Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($socialType->socials as $socials): ?>
            <tr>
                <td><?= h($socials->id) ?></td>
                <td><?= h($socials->net_id) ?></td>
                <td><?= h($socials->social_type_id) ?></td>
                <td><?= h($socials->created) ?></td>
                <td><?= h($socials->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Socials', 'action' => 'view', $socials->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Socials', 'action' => 'edit', $socials->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Socials', 'action' => 'delete', $socials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socials->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
