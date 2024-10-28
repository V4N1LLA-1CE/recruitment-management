<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contractor> $contractors
 */
$this->layout = 'admin';
?>
<div class="contractors index content">
    <?= $this->Html->link(__('Create Contractor'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Contractors') ?></h3>
    <div class="my-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Contractor Email</th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contractors as $contractor): ?>
                        <tr>
                            <td><?= $this->Number->format($contractor->id) ?></td>
                            <td><?= h($contractor->first_name) ?></td>
                            <td><?= h($contractor->last_name) ?></td>
                            <td><?= h($contractor->phone_number) ?></td>
                            <td><?= h($contractor->contractor_email) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'view', $contractor->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-primary me-3',
                                        'title' => 'View'
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'edit', $contractor->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-secondary me-3',
                                        'title' => 'Edit'
                                    ]
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'delete', $contractor->id],
                                    [
                                        'confirm' => __('Are you sure you want to delete # {0}?', $contractor->id),
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
