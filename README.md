# Getting Started

    - docker-compose build
    - docker-compose up
    - docker-compose exec php bash
        - composer create-project zendframework/skeleton-application .
        - access: http://localhost:8080/

### Zend structure

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
        - src: where yours business code will be
        - test: where yours tests will be
        - view: where yours views will be

tutorial: https://www.youtube.com/watch?v=SxVrYHVLkxY&list=PL-gbes0UxLJMMQVuRvgmp-yBNxQIbpBL8&index=5