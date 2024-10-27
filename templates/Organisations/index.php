<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Organisation> $organisations
 */
$this->layout = 'admin';
?>
<div class="organisations index content">
    <?= $this->Html->link(__('Create Organisation'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Organisations') ?></h3>
    <div class="my-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Business Name</th>
                        <th>Contact First Name</th>
                        <th>Contact Last Name</th>
                        <th>Contact Email</th>
                        <th>Current Website</th>
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
    </div>
</div>
