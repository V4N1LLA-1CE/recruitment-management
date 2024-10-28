<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= h($organisation->business_name) ?></h3>
            <div>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisation->id], ['class' => 'btn btn-secondary btn-sm me-2 px-4']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $organisation->id],
                    ['confirm' => __('Are you sure you want to delete this organisation?'), 'class' => 'btn btn-danger btn-sm px-3']
                ) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="w-50"><?= __('Business Name') ?></th>
                            <td><?= h($organisation->business_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Name') ?></th>
                            <td><?= h($organisation->contact_first_name . ' ' . $organisation->contact_last_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Email') ?></th>
                            <td><?= h($organisation->contact_email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Current Website') ?></th>
                            <td><?= $organisation->current_website ? $this->Html->link($organisation->current_website, $organisation->current_website, ['target' => '_blank']) : '-' ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><?= __('Industry') ?></h5>
                </div>
                <div class="card-body">
                    <?php if ($organisation->industry): ?>
                        <?= $this->Text->autoParagraph(h($organisation->industry)); ?>
                    <?php else: ?>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <?= __('No industry information has been provided for this organisation') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($organisation->contacts)): ?>
                <div class="card mb-4">
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
                                    <?php foreach ($organisation->contacts as $contact): ?>
                                        <tr>
                                            <td><?= h($contact->first_name . ' ' . $contact->last_name) ?></td>
                                            <td><?= h($contact->email) ?></td>
                                            <td><?= h($contact->phone_number) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id], ['class' => 'btn btn-sm btn-secondary me-2']) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete this contact?'), 'class' => 'btn btn-sm btn-danger']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?= __('Related Projects') ?></h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($organisation->projects)): ?>
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
                                    <?php foreach ($organisation->projects as $project): ?>
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
                                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-sm btn-primary me-2']) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-sm btn-secondary me-2']) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete this project?'), 'class' => 'btn btn-sm btn-danger']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <?= __('No projects are associated with this organisation') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
