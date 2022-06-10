# Getting Started

    - docker-compose build
    - docker-compose up
    - docker-compose exec php bash
        - composer create-project zendframework/skeleton-application .
            - or composer install
        - cd ..
        - chown -R www-data:www-data zend_docker/data/
        - access: http://localhost:8080/
        - tutorial: https://www.youtube.com/watch?v=zBH-UXj8y2w&list=PL-gbes0UxLJMMQVuRvgmp-yBNxQIbpBL8
##### Structure

    - bin: binaries
    - config: project environment configuration
    - data: all things about data
    - module: where save all the application modules
        - each class is a module
        - each module should contain the MVC inside
    - public: public files

##### Creating a new module
    
    - create the folder inside the module folder
        - CamelCase
    - inside it create
        - config: it works like a annotation file
            - create a module.config.php file
            - put your routes configuration as array
        - src: where yours business code will be (MC)

            root:
                - create a Module.php file
                - include the module.config.php file inside the getConfig method
            
            models:
                - create a Model folder
                - create a file with your module name
                    - set the namespace to your module
                    - put the fields from database
                        - getters and setters to all fields
                    - composer require zendframework/zend-db
                - create a TableGateway class
                    - here is where you put all of your methods
                      to manipulate the table data
                

            controller:
                - create a Controller folder
                - create a ModuleController.php file
        - view: where yours views will be
            - create a folder for your module with snake_case
                - create a .phtml file inside do some front-end stuff

        - test: where yours tests will be

##### Registering a new module

    - this step must be repeated when you add a new package inside the project

    - add to composer.json
        - autoload
            - "psr-4": {
                "YourModuleNamespace\\": "PathTo/",
            }
    - add to app/config/modules.config.php
    - composer update

###### TODO

    - improve front-end
    - see why status is not working on edit page