<?php
namespace ES\Framework;


abstract class EventApplier
{
	public function apply(\Serializable $event) {
		preg_match("#[a-z0-9]+$#i", get_class($event), $result);
		if (isset($result[0])) {
			$this->{"apply".$result[0]}($event);
		}
	}
}
