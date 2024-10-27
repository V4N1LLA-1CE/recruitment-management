<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Organisation> $organisations
 */
$this->layout = 'admin';
?>
<div class="organisations index content">
    <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Organisations') ?></h3>
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('business_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_first_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_last_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_email') ?></th>
                    <th><?= $this->Paginator->sort('current_website') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organisations as $organisation): ?>
                    <tr>
                        <td><?= $this->Number->format($organisation->id) ?></td>
                        <td><?= h($organisation->business_name) ?></td>
                        <td><?= h($organisation->contact_first_name) ?></td>
                        <td><?= h($organisation->contact_last_name) ?></td>
                        <td><?= h($organisation->contact_email) ?></td>
                        <td><?= h($organisation->current_website) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $organisation->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
