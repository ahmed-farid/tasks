<?php

function setting() {
	return App\Model\Setting::orderBy('id', 'desc')->first();
}