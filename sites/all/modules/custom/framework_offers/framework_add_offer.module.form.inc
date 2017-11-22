<?php 


function framework_add_offer_form($node, &$form_state) {
    return node_content_form($node, $form_state); 
}