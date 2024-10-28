<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contact> $contacts
 */
$this->layout = 'admin';
?>
<div class="contacts index content">
    <h3><?= __('Messages') ?></h3>
    <div class="my-4">
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
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'view', $contact->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-primary me-3',
                                        'title' => 'View'
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'edit', $contact->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-secondary me-3',
                                        'title' => 'Edit'
                                    ]
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'delete', $contact->id],
                                    [
                                        'confirm' => __('Are you sure you want to delete # {0}?', $contact->id),
                                        'escape' => false,
                                        'class' => 'text-danger',
                                        'title' => 'Delete'
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
