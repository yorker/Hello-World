<?php
function smarty_modifier_app_url($string) {
	return App::url($string);
}