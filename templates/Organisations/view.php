<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Organisation'), ['action' => 'edit', $organisation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Organisation'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="organisations view content">
            <h3><?= h($organisation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Business Name') ?></th>
                    <td><?= h($organisation->business_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact First Name') ?></th>
                    <td><?= h($organisation->contact_first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Last Name') ?></th>
                    <td><?= h($organisation->contact_last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Email') ?></th>
                    <td><?= h($organisation->contact_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Website') ?></th>
                    <td><?= h($organisation->current_website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($organisation->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Industry') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($organisation->industry)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Contacts') ?></h4>
                <?php if (!empty($organisation->contacts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Organisation Id') ?></th>
                            <th><?= __('Contractor Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($organisation->contacts as $contact) : ?>
                        <tr>
                            <td><?= h($contact->id) ?></td>
                            <td><?= h($contact->first_name) ?></td>
                            <td><?= h($contact->last_name) ?></td>
                            <td><?= h($contact->email) ?></td>
                            <td><?= h($contact->phone_number) ?></td>
                            <td><?= h($contact->message) ?></td>
                            <td><?= h($contact->organisation_id) ?></td>
                            <td><?= h($contact->contractor_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($organisation->projects)) : ?>
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
                        <?php foreach ($organisation->projects as $project) : ?>
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