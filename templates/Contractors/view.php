<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= h($contractor->first_name . ' ' . $contractor->last_name) ?></h3>
            <div>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contractor->id], ['class' => 'btn btn-warning btn-sm me-2 px-4']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $contractor->id],
                    ['confirm' => __('Are you sure you want to delete this contractor?'), 'class' => 'btn btn-danger btn-sm px-3']
                ) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('First Name') ?></th>
                            <td><?= h($contractor->first_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Last Name') ?></th>
                            <td><?= h($contractor->last_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone Number') ?></th>
                            <td><?= h($contractor->phone_number) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($contractor->contractor_email) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php if (!empty($contractor->skills)): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Skills') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($contractor->skills as $skill): ?>
                                <span class="badge bg-info text-white mx-1"><?= h($skill->skill_name) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($contractor->projects)): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Related Projects') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?= __('Project Name') ?></th>
                                        <th><?= __('Due Date') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contractor->projects as $project): ?>
                                        <tr>
                                            <td><?= h($project->project_name) ?></td>
                                            <td><?= $project->project_due_date ? h($project->project_due_date->format('Y-m-d')) : '-' ?></td>
                                            <td>
                                                <?php if ($project->complete): ?>
                                                    <span class="badge bg-success text-white">Completed</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark">In Progress</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-sm btn-primary px-3']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($contractor->contacts)): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Related Contacts') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Email') ?></th>
                                        <th><?= __('Phone Number') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contractor->contacts as $contact): ?>
                                        <tr>
                                            <td><?= h($contact->first_name . ' ' . $contact->last_name) ?></td>
                                            <td><?= h($contact->email) ?></td>
                                            <td><?= h($contact->phone_number) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
