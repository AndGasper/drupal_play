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
        '#type' => 'textfield',
        '#title' => t('Form Title')
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
z