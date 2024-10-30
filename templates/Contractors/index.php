<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contractor> $contractors
 * @var array $skills
 */
$this->layout = 'admin';
?>
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= __('Contractors') ?></h3>
            <?= $this->Html->link(__('Create Contractor'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <div class="mb-4">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'valueSources' => ['query']]) ?>
                <?= $this->Form->hidden('limit', ['value' => $this->request->getQuery('limit', 10)]) ?>
                <div class="col-md-3">
                    <?= $this->Form->control('name', [
                        'label' => 'Search by Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter first or last name',
                        'value' => $this->request->getQuery('name'),
                        'required' => false
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('email', [
                        'label' => 'Search by Email',
                        'class' => 'form-control',
                        'placeholder' => 'Enter email',
                        'value' => $this->request->getQuery('email'),
                        'required' => false
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('sort', [
                        'label' => 'Sort by',
                        'class' => 'form-control',
                        'options' => [
                            'name' => 'Name',
                            'projects' => 'Number of Projects',
                            'email' => 'Email'
                        ],
                        'empty' => 'Select sorting',
                        'value' => $this->request->getQuery('sort'),
                        'required' => false
                    ]) ?>
                </div>
                <div class="col-12 my-3">
                    <label class="form-label">Filter by Skills</label>
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
                            <th><?= $this->Paginator->sort('first_name', 'First Name') ?></th>
                            <th><?= $this->Paginator->sort('last_name', 'Last Name') ?></th>
                            <th><?= $this->Paginator->sort('phone_number', 'Phone Number') ?></th>
                            <th><?= $this->Paginator->sort('contractor_email', 'Email') ?></th>
                            <th>Projects Count</th>
                            <th>Skills</th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contractors as $contractor): ?>
                            <tr>
                                <td><?= $this->Number->format($contractor->id) ?></td>
                                <td><?= h($contractor->first_name) ?></td>
                                <td><?= h($contractor->last_name) ?></td>
                                <td><?= h($contractor->phone_number) ?></td>
                                <td><?= h($contractor->contractor_email) ?></td>
                                <td><?= count($contractor->projects ?? []) ?></td>
                                <td>
                                    <?php if (!empty($contractor->skills)): ?>
                                        <div class="d-flex flex-wrap ">
                                            <?php foreach ($contractor->skills as $skill): ?>
                                                <span class="badge bg-info text-white mx-1"><?= h($skill->skill_name) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'view', $contractor->id],
                                        ['escape' => false, 'class' => 'text-primary me-3', 'title' => 'View']
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'edit', $contractor->id],
                                        ['escape' => false, 'class' => 'text-secondary me-3', 'title' => 'Edit']
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                        ['action' => 'delete', $contractor->id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $contractor->id),
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

<!-- KEEP LIMIT THE SAME SO cAN SHOW MORE Entries -->
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
