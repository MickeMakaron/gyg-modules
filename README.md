gyg-modules
===========

Modules framework for web development.


##Installation
Install anywhere.

##Setup
Construct a ModuleLoader object,
    
    $moduleLoader = new ModuleLoader($modulesPath);
    
where _modulesPath_ is the directory where future modules are to be installed. 

That's it! All modules should now be accessible anywhere, assuming the module is installed correctly (see **Installing a module**).


###Installing a module
All module files must be located below the user-defined _modulesPath_ directory. The module must be enclosed in a class definition, and the name of the class must be the same as the folder the module resides in. Additionally, in the module's folder there must a file named _main.php_. 

For example, when installing a module called "Garlic", there must be a main file located in

    modulesPath/Garlic/main.php
    
and the functions of the module must be enclosed in a class named Garlic. 




###Using a module
gyg-modules uses spl_autoload, which means that whenever a module (assuming it is correctly installed) is called into action, its main file will be included automatically. This means that one does not have to worry about including the module's files before using it. 