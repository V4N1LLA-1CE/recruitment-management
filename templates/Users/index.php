<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
$this->layout = 'admin';
?>
<div class="users index content">
    <?= $this->Html->link(__('Create User'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="my-4">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'view', $user->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-primary me-3',
                                        'title' => 'View'
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'edit', $user->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-secondary me-3',
                                        'title' => 'Edit'
                                    ]
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'delete', $user->id],
                                    [
                                        'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
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
