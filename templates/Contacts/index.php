<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contact> $contacts
 */
$this->layout = 'admin';
?>
<div class="contacts index content">
    <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contacts') ?></h3>
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Organisation</th>
                    <th>Contractor</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= $this->Number->format($contact->id) ?></td>
                        <td><?= h($contact->first_name) ?></td>
                        <td><?= h($contact->last_name) ?></td>
                        <td><?= h($contact->email) ?></td>
                        <td><?= h($contact->phone_number) ?></td>
                        <td><?= $contact->hasValue('organisation') ? $this->Html->link($contact->organisation->business_name, ['controller' => 'Organisations', 'action' => 'view', $contact->organisation->id]) : '' ?></td>
                        <td><?= $contact->hasValue('contractor') ? $this->Html->link(($contact->contractor->first_name . " " . $contact->contractor->last_name), ['controller' => 'Contractors', 'action' => 'view', $contact->contractor->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
