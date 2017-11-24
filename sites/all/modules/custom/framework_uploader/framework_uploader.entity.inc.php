<?php

function framework_uploader_entity_info() {
    $return = array(
        'node' => array(
            'label' => t('Node'),
            'controller class' => 'NodeController',
            'base table' => 'node',
            'revision table' => 'node_revision',
            'uri callback' => 'node_uri',
            'fieldable' => TRUE,
            'translation' => array(
                'locale' => TRUE
            ),
            'entity keys' => array(
                'first_name' => 'fname',
                'last_name' => 'lname', 
                'bundle' => 'heroes',
                'language' => 'language',
            )
        ),
    );
}


foreach (node_type_get_names() as $type => $name) {
    $return['node']['bundles'][$type] = array(
        'label' =>  $name, 
        'admin' => array(
            'path' => 'admin/structure/types/manage/%node_type',
            'real path' => 'admin/structure/types/manage/' . str_replace('_', '-', $type),
            'bundle argument' => 4,
            'access arguments' => array(
                'administer content types',
            )
        )
    );
}
