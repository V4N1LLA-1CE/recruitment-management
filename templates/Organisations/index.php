<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Organisation> $organisations
 */
$this->layout = 'admin';
?>
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold text-primary"><?= __('Organisations') ?></h3>
            <?= $this->Html->link(__('Create Organisation'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <div class="mb-4">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'valueSources' => ['query']]) ?>
                <?= $this->Form->hidden('limit', ['value' => $this->request->getQuery('limit', 10)]) ?>

                <div class="col-md-4">
                    <?= $this->Form->control('name', [
                        'label' => 'Search by Organisation Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter organisation name',
                        'value' => $this->request->getQuery('name'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= $this->Form->control('sort', [
                        'label' => 'Sort by',
                        'class' => 'form-control',
                        'options' => [
                            'name' => 'Organisation Name',
                            'projects' => 'Number of Projects'
                        ],
                        'empty' => 'Select sorting',
                        'value' => $this->request->getQuery('sort'),
                        'required' => false
                    ]) ?>
                </div>

                <div class="col-12 mt-2">
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
                <?php if (count($organisations) > 0): ?>
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                                <th><?= $this->Paginator->sort('business_name', 'Business Name') ?></th>
                                <th><?= $this->Paginator->sort('contact_first_name', 'Contact First Name') ?></th>
                                <th><?= $this->Paginator->sort('contact_last_name', 'Contact Last Name') ?></th>
                                <th><?= $this->Paginator->sort('contact_email', 'Contact Email') ?></th>
                                <th><?= $this->Paginator->sort('current_website', 'Current Website') ?></th>
                                <th>Projects Count</th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($organisations as $organisation): ?>
                                <tr>
                                    <td><?= $this->Number->format($organisation->id) ?></td>
                                    <td><?= h($organisation->business_name) ?></td>
                                    <td><?= h($organisation->contact_first_name) ?></td>
                                    <td><?= h($organisation->contact_last_name) ?></td>
                                    <td><?= h($organisation->contact_email) ?></td>
                                    <td><?= h($organisation->current_website) ?></td>
                                    <td><?= count($organisation->projects ?? []) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-eye" style="font-size: 1.2rem;"></i>',
                                            ['action' => 'view', $organisation->id],
                                            ['escape' => false, 'class' => 'text-primary me-3', 'title' => 'View']
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<i class="fas fa-edit" style="font-size: 1.2rem;"></i>',
                                            ['action' => 'edit', $organisation->id],
                                            ['escape' => false, 'class' => 'text-secondary me-3', 'title' => 'Edit']
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<i class="fas fa-trash" style="font-size: 1.2rem;"></i>',
                                            ['action' => 'delete', $organisation->id],
                                            [
                                                'confirm' => __('Are you sure you want to delete # {0}?', $organisation->id),
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
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-info-circle"></i> No Results Found</h4>
                        <p class="mb-0">No organisations match your search criteria. Try adjusting your filters or search terms.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php
            // Get current limit
            $currentLimit = $this->request->getQuery('limit', 10);

            // Set up templates with the current limit
            $paginatorTemplates = [
                'first' => '<li class="page-item"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'last' => '<li class="page-item"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'current' => '<li class="page-item active"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}&limit=' . $currentLimit . '">{{text}}</a></li>',
                'firstDisabled' => '<li class="page-item disabled"><a class="page-link" href="">{{text}}</a></li>',
                'lastDisabled' => '<li class="page-item disabled"><a class="page-link" href="">{{text}}</a></li>',
                'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="">{{text}}</a></li>',
                'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="">{{text}}</a></li>',
                'ellipsis' => '<li class="page-item disabled"><a class="page-link" href="">...</a></li>'
            ];
            ?>

            <div class="paginator">
                <ul class="pagination justify-content-center mt-4">
                    <?= $this->Paginator->first('<< ' . __('First'), [
                        'escape' => false,
                        'templates' => $paginatorTemplates
                    ]) ?>
                    <?= $this->Paginator->prev('< ' . __('Previous'), [
                        'escape' => false,
                        'templates' => $paginatorTemplates
                    ]) ?>
                    <?= $this->Paginator->numbers([
                        'modulus' => 4,
                        'separator' => '',
                        'templates' => $paginatorTemplates
                    ]) ?>
                    <?= $this->Paginator->next(__('Next') . ' >', [
                        'escape' => false,
                        'templates' => $paginatorTemplates
                    ]) ?>
                    <?= $this->Paginator->last(__('Last') . ' >>', [
                        'escape' => false,
                        'templates' => $paginatorTemplates
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
