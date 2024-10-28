<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= h($contact->first_name . ' ' . $contact->last_name) ?></h3>
            <div>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id], ['class' => 'btn btn-secondary btn-sm me-2 px-4']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $contact->id],
                    ['confirm' => __('Are you sure you want to delete this contact?'), 'class' => 'btn btn-danger btn-sm px-3']
                ) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('First Name') ?></th>
                            <td><?= h($contact->first_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Last Name') ?></th>
                            <td><?= h($contact->last_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($contact->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone Number') ?></th>
                            <td><?= h($contact->phone_number) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('Organisation') ?></th>
                            <td>
                                <?php if ($contact->hasValue('organisation')): ?>
                                    <?= $this->Html->link(
                                        h($contact->organisation->business_name),
                                        ['controller' => 'Organisations', 'action' => 'view', $contact->organisation->id],
                                        ['class' => 'text-primary']
                                    ) ?>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Contractor') ?></th>
                            <td>
                                <?php if ($contact->hasValue('contractor')): ?>
                                    <?= $this->Html->link(
                                        h($contact->contractor->first_name . ' ' . $contact->contractor->last_name),
                                        ['controller' => 'Contractors', 'action' => 'view', $contact->contractor->id],
                                        ['class' => 'text-primary']
                                    ) ?>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php if ($contact->message): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Message') ?></h5>
                    </div>
                    <div class="card-body">
                        <?= $this->Text->autoParagraph(h($contact->message)); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
