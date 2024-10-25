<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Skills'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Skill'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="skills view content">
            <h3><?= h($skill->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($skill->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Skill Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($skill->skill_name)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Contractors') ?></h4>
                <?php if (!empty($skill->contractors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Contractor Email') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($skill->contractors as $contractor) : ?>
                        <tr>
                            <td><?= h($contractor->id) ?></td>
                            <td><?= h($contractor->first_name) ?></td>
                            <td><?= h($contractor->last_name) ?></td>
                            <td><?= h($contractor->phone_number) ?></td>
                            <td><?= h($contractor->contractor_email) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contractors', 'action' => 'view', $contractor->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contractors', 'action' => 'edit', $contractor->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contractors', 'action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($skill->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Management Tool Link') ?></th>
                            <th><?= __('Project Due Date') ?></th>
                            <th><?= __('Last Checked') ?></th>
                            <th><?= __('Complete') ?></th>
                            <th><?= __('Contractor Id') ?></th>
                            <th><?= __('Organisation Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($skill->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->project_name) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= h($project->management_tool_link) ?></td>
                            <td><?= h($project->project_due_date) ?></td>
                            <td><?= h($project->last_checked) ?></td>
                            <td><?= h($project->complete) ?></td>
                            <td><?= h($project->contractor_id) ?></td>
                            <td><?= h($project->organisation_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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