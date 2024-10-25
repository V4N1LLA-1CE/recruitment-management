<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
?>
<div class="projects index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_name') ?></th>
                    <th><?= $this->Paginator->sort('management_tool_link') ?></th>
                    <th><?= $this->Paginator->sort('project_due_date') ?></th>
                    <th><?= $this->Paginator->sort('last_checked') ?></th>
                    <th><?= $this->Paginator->sort('complete') ?></th>
                    <th><?= $this->Paginator->sort('contractor_id') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id') ?></th>
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
                    <td><?= h($project->complete) ?></td>
                    <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->id, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                    <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->id, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
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
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>