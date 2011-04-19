<?php
/**
 * Loader class
 *
 * This class loads other classes and files
 *
 * @author Gilbert Pellegrom
 * @package PIP
 */
class Load {
     
    /**
     * Load a model, return the model object
     * @param string Model name
     * @return object
     */
	public function model($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
    /**
     * Load a view, return the view object
     * @param string View name
     * @return object
     */
	public function view($name)
	{
		$view = new View($name);
		return $view;
	}
	
    /**
     * Load a plugin library
     * @param string Plugin name
     */
	public function plugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}
	
    /**
     * Load a helper class, return the helper object
     * @param string Helper name
     * @return object
     */
	public function helper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}

}
