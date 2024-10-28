<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= h($project->project_name) ?></h3>
            <div>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id], ['class' => 'btn btn-secondary btn-sm me-2 px-4']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $project->id],
                    ['confirm' => __('Are you sure you want to delete this project?'), 'class' => 'btn btn-danger btn-sm px-3']
                ) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('Project Name') ?></th>
                            <td><?= h($project->project_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Management Tool Link') ?></th>
                            <td><?= $project->management_tool_link ? $this->Html->link($project->management_tool_link, $project->management_tool_link, ['target' => '_blank']) : '-' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contractor') ?></th>
                            <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->first_name . ' ' . $project->contractor->last_name, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '-' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Organisation') ?></th>
                            <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->business_name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '-' ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('Project Due Date') ?></th>
                            <td><?= $project->project_due_date ? h($project->project_due_date->format('Y-m-d')) : '-' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Last Checked') ?></th>
                            <td><?= $project->last_checked ? h($project->last_checked->format('Y-m-d')) : '-' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                <?php if ($project->complete): ?>
                                    <span class="badge bg-success text-white">Completed</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">In Progress</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php if ($project->description): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Description') ?></h5>
                    </div>
                    <div class="card-body">
                        <?= $this->Text->autoParagraph(h($project->description)); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($project->skills)): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?= __('Required Skills') ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($project->skills as $skill): ?>
                                <span class="badge bg-info mx-1 text-white"><?= h($skill->skill_name) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
