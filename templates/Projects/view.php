<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project Name') ?></th>
                    <td><?= h($project->project_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Management Tool Link') ?></th>
                    <td><?= h($project->management_tool_link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contractor') ?></th>
                    <td><?= $project->hasValue('contractor') ? $this->Html->link($project->contractor->id, ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Organisation') ?></th>
                    <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->id, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Due Date') ?></th>
                    <td><?= h($project->project_due_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Checked') ?></th>
                    <td><?= h($project->last_checked) ?></td>
                </tr>
                <tr>
                    <th><?= __('Complete') ?></th>
                    <td><?= $project->complete ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Skills') ?></h4>
                <?php if (!empty($project->skills)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Skill Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->skills as $skill) : ?>
                        <tr>
                            <td><?= h($skill->id) ?></td>
                            <td><?= h($skill->skill_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skill->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skill->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>