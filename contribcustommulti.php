<?php

require_once 'contribcustommulti.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function contribcustommulti_civicrm_config(&$config) {
  _contribcustommulti_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function contribcustommulti_civicrm_xmlMenu(&$files) {
  _contribcustommulti_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function contribcustommulti_civicrm_install() {
  _contribcustommulti_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function contribcustommulti_civicrm_uninstall() {
  _contribcustommulti_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contribcustommulti_civicrm_enable() {
  _contribcustommulti_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function contribcustommulti_civicrm_disable() {
  _contribcustommulti_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function contribcustommulti_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contribcustommulti_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function contribcustommulti_civicrm_managed(&$entities) {
  _contribcustommulti_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contribcustommulti_civicrm_caseTypes(&$caseTypes) {
  _contribcustommulti_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contribcustommulti_civicrm_angularModules(&$angularModules) {
_contribcustommulti_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function contribcustommulti_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contribcustommulti_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function contribcustommulti_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function contribcustommulti_civicrm_navigationMenu(&$menu) {
  _contribcustommulti_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'biz.lcdservices.contribcustommulti')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _contribcustommulti_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_buildForm().
 *
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function contribcustommulti_civicrm_buildForm($formName, &$form) {
  if( $formName == 'CRM_Custom_Form_Group' ) {
    $contactTypes = array('Contact', 'Individual', 'Household', 'Organization', 'Contribution');
    $form->assign('contactTypes', json_encode($contactTypes));
    //add template to run jquery for Display Style option on Custom Data set form
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "CRM/LCD/Custom/Form/group.tpl"
    ));
  }
  //add template to or Display Style option on Custom Data set form on Contribution page
  if( $formName == 'CRM_Contribute_Form_Contribution' ) {
    CRM_Core_Region::instance('page-body')->add(array(
      'template' => "CRM/LCD/contribcustommulti/Form/CustomData.tpl"
    ));  
  }
}

/**
 * Alter tpl file to include a different tpl file based on contribution/multi-record custom field type
 * (if one exists).
 * @param string $formName name of the form
 * @param object $form (reference) form object
 * @param string $context page or form
 * @param string $tplName (reference) change this if required to the altered tpl file
 */
function contribcustommulti_civicrm_alterTemplateFile($formName, &$form, $context, &$tplName) {
  if( $formName == 'CRM_Custom_Form_CustomDataByType' && ( $form->getVar( '_type' ) == 'Contribution' )) {
    $group = $form->getVar('_groupTree');
    foreach($group as $key=>$value){
      if(isset($value['is_multiple']) && $value['is_multiple'] == 1){
        $updatedTpl = 'CRM/LCD/Custom/Form/CustomDataByType.tpl';
        $template = CRM_Core_Smarty::singleton();
        if ($template->template_exists($updatedTpl)) {
          //$tplName = $updatedTpl;
        }
      }
    }
  }
}
/**
 * Implements hook_civicrm_preProcess().
 *
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function contribcustommulti_civicrm_preProcess($formName, &$form) {
  if ( is_a( $form, 'CRM_Contribute_Form_Contribution' ) ) {
    $data = CRM_Custom_Form_CustomData::preProcess($form, NULL, $form->_contributionType, NULL,
      ($form->_type) ? $form->_type : 'Contribution'
    );
    $cached_groupTree = $form->_groupTree;
    
    $getParams = array(
      'entityID' => $form->_id,
      'entityType' => 'Contribution',
    );
    $result = CRM_Core_BAO_CustomValueTable::getValues($getParams);
    // Convert multi-value strings to arrays
    $sp = CRM_Core_DAO::VALUE_SEPARATOR;
    $values = array();
    foreach ($result as $id => $value) {
      $field_name = $id;
      if (strpos($value, $sp) !== FALSE) {
        $value = explode($sp, trim($value, $sp));
      }

      $idArray = explode('_', $id);
      if ($idArray[0] != 'custom') {
        continue;
      }
      $fieldNumber = $idArray[1];
      $customFieldInfo = CRM_Core_BAO_CustomField::getNameFromID($fieldNumber);
      $info = array_pop($customFieldInfo);

      if (empty($idArray[2])) {
        $n = 0;
        $id = $fieldNumber;
      }
      else {
        $n = $idArray[2];
        $id = $fieldNumber . "." . $idArray[2];
      }
      if (!empty($getParams['format.field_names'])) {
        $id = $info['field_name'];
      }
      else {
        $id = $fieldNumber;
      }
      //set 'latest' -useful for multi fields but set for single for consistency
      $values[$id][$n]['entity_id'] = $getParams['entityID'];
      $values[$id][$n]['element_name'] = $field_name;
      $values[$id][$n]['element_value'] = $value;
      $values[$id][$n][$n] = $value;
      
    }
    foreach($cached_groupTree as $key => $cached_tree){
      foreach($cached_tree['fields'] as $field_key => $cached_tree_fields){
        $table_count = count($values[$field_key]);
        $cached_groupTree[$key]['table_id'] = $table_count;
        $first = current($values[$field_key]);
        $cached_groupTree[$key]['fields'][$field_key]['field_values'] = $values[$field_key];
        $cached_groupTree[$key]['fields'][$field_key]['element_name'] = $first['element_name'];
        $cached_groupTree[$key]['fields'][$field_key]['element_value'] = $first['element_value'];
      }
    }
    $form->assign('cached_groupTree', $cached_groupTree);
    CRM_Core_BAO_CustomGroup::buildQuickForm($form, $cached_groupTree);
    unset($form->_groupTree);
  }
}