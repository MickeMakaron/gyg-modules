<?php
/****************************************************************
 ****************************************************************
 * 
 * gyg-framework - Basic framework for web development
 * Copyright (C) 2014 Mikael Hernvall (mikael.hernvall@gmail.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 ****************************************************************
 ****************************************************************/


Class ModuleLoader
{
	private $modulesPath;

	public function __construct($modulesPath)
	{
		$this->modulesPath = rtrim(realpath($modulesPath), '/');
		spl_autoload_register([$this, 'loadModule']);
	}

	
	/**
	 * \brief Load module, if whitelisted, by including its main file.
	 *
	 * \param moduleId string ID of module to load.
	 *
	 * \return bool True if module was successfully loaded, else false.
	 */
	public function loadModule($moduleId)
	{
		$modulePath = $this->modulesPath . "/{$moduleId}/main.php";
		
		if(!is_file($modulePath))
			throw new Exception("Main file of '{$moduleId}' module not found. Expected path: '{$modulePath}'.");
		
		require_once($modulePath);
	}
};