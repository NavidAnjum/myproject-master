<?php
interface Icontroller{
	public function preDispatch();
	public function postDispatch();
	public function permission();

}
