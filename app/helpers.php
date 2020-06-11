<?php

function setActive($routeName){
	return request()->routeIs($routeName) ? 'link-active' : null;
}

?>