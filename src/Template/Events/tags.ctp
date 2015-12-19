<h1>
    Events tagged with
    <?= $this->Text->toList($tags) ?>
</h1>

<section>
<?php foreach ($events as $event): ?>
    <article>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link($event->name, $event->url) ?></h4>
        <small><?= h($event->url) ?></small>

        <!-- Use the TextHelper to format text -->
        <?= $this->Text->autoParagraph($event->description) ?>
    </article>
<?php endforeach; ?>
</section>
