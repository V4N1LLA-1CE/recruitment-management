<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 * @var array $skills
 * @var array $statusOptions
 */
$this->layout = 'admin';
?>
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= __('Projects') ?></h3>
            <?= $this->Html->link(__('Create Project'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <div class="mb-4">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'valueSources' => ['query']]) ?>
                <?= $this->Form->hidden('limit', ['value' => $this->request->getQuery('limit', 10)]) ?>

                <div class="col-md-3">
                    <?= $this->Form->control('status', [
                        'label' => 'Filter by Status',
                        'class' => 'form-control',
                        'options' => $statusOptions,
                        'empty' => 'All Status',
                        'value' => $this->request->getQuery('status'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-md-3">
                    <?= $this->Form->control('start_date', [
                        'label' => 'Due Date From',
                        'class' => 'form-control',
                        'type' => 'datetime',
                        'value' => $this->request->getQuery('start_date'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-md-3">
                    <?= $this->Form->control('end_date', [
                        'label' => 'Due Date To',
                        'class' => 'form-control',
                        'type' => 'datetime',
                        'value' => $this->request->getQuery('end_date'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-md-3">
                    <?= $this->Form->control('sort', [
                        'label' => 'Sort by',
                        'class' => 'form-control',
                        'options' => [
                            'name' => 'Project Name',
                            'due_date' => 'Due Date',
                            'status' => 'Status'
                        ],
                        'empty' => 'Select sorting',
                        'value' => $this->request->getQuery('sort'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-12 my-3">
                    <label class="form-label">Filter by Skills Required</label>
                    <div class="d-flex flex-wrap gap-3">
                        <?php foreach ($skills as $id => $skillName): ?>
                            <div class="form-check mx-2">
                                <?= $this->Form->checkbox('skills[]', [
                                    'value' => $id,
                                    'id' => 'skill-' . $id,
                                    'class' => 'form-check-input',
                                    'checked' => in_array($id, (array)$this->request->getQuery('skills')),
                                ]) ?>
                                <label class="form-check-label" for="skill-<?= $id ?>">
                                    <?= h($skillName) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-12">
                    <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary me-2']) ?>
                    <?= $this->Html->link(
                        __('Reset'),
                        ['action' => 'index', '?' => ['limit' => $this->request->getQuery('limit', 10)]],
                        ['class' => 'btn btn-secondary']
                    ) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>

            <!-- Entries dropdown -->
            <div class="d-flex align-items-center mb-3">
                <label class="me-2">Show entries:</label>
                <?= $this->Form->select(
                    'limit',
                    [
                        10 => '10',
                        25 => '25',
                        50 => '50',
                        PHP_INT_MAX => 'All'
                    ],
                    [
                        'id' => 'limit',
                        'class' => 'form-control mx-2 mb-1',
                        'style' => 'width: auto;',
                        'value' => $this->request->getQuery('limit', 10),
                    ]
                ) ?>
            </div>

            <!-- Results Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('project_name', 'Project Name') ?></th>
                            <th><?= $this->Paginator->sort('management_tool_link', 'Management Tool Link') ?></th>
                            <th><?= $this->Paginator->sort('project_due_date', 'Due Date') ?></th>
                            <th><?= $this->Paginator->sort('last_checked', 'Last Checked') ?></th>
                            <th><?= $this->Paginator->sort('complete', 'Status') ?></th>
                            <th>Contractor</th>
                            <th>Organisation</th>
                            <th>Skills Required</th>
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
                                <td><?= $project->complete ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-warning">In Progress</span>' ?></td>
                                <td><?= $project->hasValue('contractor') ? $this->Html->link(($project->contractor->first_name . " " . $project->contractor->last_name), ['controller' => 'Contractors', 'action' => 'view', $project->contractor->id]) : '' ?></td>
                                <td><?= $project->hasValue('organisation') ? $this->Html->link($project->organisation->business_name, ['controller' => 'Organisations', 'action' => 'view', $project->organisation->id]) : '' ?></td>
                                <td>
                                    <?php if (!empty($project->skills)): ?>
                                        <div class="d-flex flex-wrap">
                                            <?php foreach ($project->skills as $skill): ?>
                                                <span class="badge bg-info text-white mx-1"><?= h($skill->skill_name) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'view', $project->id],
                                        ['escape' => false, 'class' => 'text-primary me-3', 'title' => 'View']
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'edit', $project->id],
                                        ['escape' => false, 'class' => 'text-secondary me-3', 'title' => 'Edit']
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'delete', $project->id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $project->id),
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

            <!-- Pagination -->
            <div class="paginator">
                <ul class="pagination justify-content-center mt-4">
                    <?= $this->Paginator->first('<< ' . __('First'), [
                        'escape' => false,
                        'templates' => [
                            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'firstDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]
                    ]) ?>
                    <?= $this->Paginator->prev('< ' . __('Previous'), [
                        'escape' => false,
                        'templates' => [
                            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]
                    ]) ?>
                    <?= $this->Paginator->numbers([
                        'modulus' => 4,
                        'separator' => '',
                        'class' => 'page-item',
                        'currentClass' => 'active',
                        'templates' => [
                            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'ellipsis' => '<li class="page-item disabled"><a class="page-link" href="">...</a></li>'
                        ]
                    ]) ?>
                    <?= $this->Paginator->next(__('Next') . ' >', [
                        'escape' => false,
                        'templates' => [
                            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]
                    ]) ?>
                    <?= $this->Paginator->last(__('Last') . ' >>', [
                        'escape' => false,
                        'templates' => [
                            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'lastDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]
                    ]) ?>
                </ul>
                <p class="text-center text-muted small">
                    <?= $this->Paginator->counter(__('Showing {{current}} record(s) out of {{count}} total')) ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
$this->Html->scriptStart(['block' => true]);
?>
document.getElementById('limit').addEventListener('change', function() {
// Get current URL parameters
const urlParams = new URLSearchParams(window.location.search);

// Update limit parameter
urlParams.set('limit', this.value);

// Always reset to page 1 when changing limit
urlParams.delete('page');

// Redirect with updated parameters
window.location.href = window.location.pathname + '?' + urlParams.toString();
});
<?php $this->Html->scriptEnd(); ?>
