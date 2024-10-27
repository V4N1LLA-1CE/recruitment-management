<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
$this->layout = 'admin';
?>
<div class="projects index content ">
    <?= $this->Html->link(__('Create Project'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Projects') ?></h3>
    <div class="my-4">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Management Tool Link</th>
                        <th>Due Date</th>
                        <th>Last Checked</th>
                        <th>Completed</th>
                        <th>Contractor</th>
                        <th>Organisation</th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project): ?>
                        <tr>
                            <td><?= $this->Number->format($project->id) ?></td>
                            <td><?= h($project->project_name) ?></td>
                            <td><?= h($project->management_tool_link) ?></td>
                            <td><?= h($project->project_due_date) ?></td>
                            <td><?= h($project->last_checked) ?></td>
                            <td><?= h($project->complete) == 1 ? '✅' : '❌'; ?></td>
                            <td><?= $project->hasValue('contractor') ? $this->Html->link(($project->contractor->first_name . " " . $project->contractor->last_name), ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                            <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->business_name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
