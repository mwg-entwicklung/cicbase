<?php

class Tx_Cicbase_ViewHelpers_IfInViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractConditionViewHelper {

	/**
	 * @param string $value
	 * @param array|string $list
	 * @return string
	 */
	public function render($value, $list) {
		if (is_array($list) ? in_array($value, $list) : t3lib_div::inList($list, $value)) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}
}
?>