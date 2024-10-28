<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Skill> $skills
 */
$this->layout = 'admin';
?>
<div class="skills index content">
    <?= $this->Html->link(__('Create Skill'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Skills') ?></h3>
    <div class="my-4">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Skill Name</th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($skills as $skill): ?>
                        <tr>
                            <td><?= $this->Number->format($skill->id) ?></td>

                            <td><?= h($skill->skill_name) ?></td>

                            <td class="actions">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'view', $skill->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-primary me-3',
                                        'title' => 'View'
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'edit', $skill->id],
                                    [
                                        'escape' => false,
                                        'class' => 'text-secondary me-3',
                                        'title' => 'Edit'
                                    ]
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                    ['action' => 'delete', $skill->id],
                                    [
                                        'confirm' => __('Are you sure you want to delete # {0}?', $skill->id),
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
