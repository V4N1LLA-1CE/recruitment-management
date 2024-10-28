<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= h($skill->skill_name) ?></h3>
            <div>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skill->id], ['class' => 'btn btn-secondary btn-sm me-2 px-4']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $skill->id],
                    ['confirm' => __('Are you sure you want to delete this skill?'), 'class' => 'btn btn-danger btn-sm px-3']
                ) ?>
            </div>
        </div>

        <div class="card-body">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><?= __('Contractors with this Skill') ?></h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($skill->contractors)): ?>
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
                                    <?php foreach ($skill->contractors as $contractor): ?>
                                        <tr>
                                            <td><?= h($contractor->first_name . ' ' . $contractor->last_name) ?></td>
                                            <td><?= h($contractor->contractor_email) ?></td>
                                            <td><?= h($contractor->phone_number) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Contractors', 'action' => 'view', $contractor->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contractors', 'action' => 'edit', $contractor->id], ['class' => 'btn btn-sm btn-secondary me-2']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <?= __('No contractors currently have this skill') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?= __('Projects Requiring this Skill') ?></h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($skill->projects)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?= __('Project Name') ?></th>
                                        <th><?= __('Due Date') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Assigned To') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($skill->projects as $project): ?>
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
                                            <td>
                                                <?php if ($project->hasValue('contractor')): ?>
                                                    <?= $this->Html->link(
                                                        h($project->contractor->first_name . ' ' . $project->contractor->last_name),
                                                        ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id],
                                                        ['class' => 'text-primary']
                                                    ) ?>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-sm btn-secondary me-2']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <?= __('No projects currently require this skill') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
