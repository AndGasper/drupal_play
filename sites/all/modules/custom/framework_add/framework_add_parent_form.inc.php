<?php

/**
 * Implements hook_form($form, &$form_state)
 * 
 * Note - hook_form() is supposed to return a "renderable" array of items
 * Meaning that this is only part of the equation
 * 
 */
function framework_add_parent_form($form, &$form_state) {
    /**
     * If you're wondering what the deal with the &$form_state is, you're not alone
     * &$variable is PHP's way of passing a function of an argument "by reference"
     * "by reference" vs. "by value" => Seems like a scope issue
     * By reference allows your edits inside the scope of a function to take effect outside of that function.
     * Hmmm...I wonder what the limit is on the scope
     * 
     */
    $form = array();

    $form['title'] = array(
        '#type' => 'item',
        '#title' => t('Form Title')
    );
    $form['ajax_element'] = array(
        '#type' => "select",
        "options" => drupal_map_assoc(array('1', '2','3')),
        '#ajax' => array(
            'callback' => 'framework_add_parent_ajax_callback',
            'wrapper' => 'other-form-element'
        )
    );

    $form['thing_getting_replaced'] = array(
        '#type' => 'item',
        '#title' => 'Nothing lasts forever',
        '#prefix' => '<div id="other-form-element"',
        '#suffix' => '</div>'
    );

    $form['submit_button'] = array(
        '#type' => 'submit',
        '#value' => t('Submit')
    );

    return $form;
}

function framework_add_parent_form_validate($form, &$form_state) {
    dpm($form_state, '$form_state'); 
}

function framework_add_parent_form_submit($form, &$form_state) {

}

function framework_add_parent_ajax_callback(&$form, &$form_state) {
    $form['thing_getting_replaced']['#title'] = "See, now it's different";

    return $form['thing_getting_replaced'];
}