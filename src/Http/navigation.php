<?php

return [
    'plugin' => [
        [
            'id' => 'notes.notes.index',
            'label' => trans('notes::label.title.notes'),
            'url' => 'admin.notes.note.index.get',
            'permission' => '',
            'order' => 1,
            'attributes' => [
                'icon'  => 'fa fa-sticky-note'
            ],
        ],
    ]
];