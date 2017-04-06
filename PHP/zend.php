# Zend framework help

initialize your own application via composer:

`composer create-project -s dev zendframework/skeleton-application path/to/yourapp`

if you want apache localhost to recognize your folder, edit your xampp/apache/conf/extra/httpd-vhosts.conf and set up a virtual host server

```
<VirtualHost *:80>
    DocumentRoot PATH
    ServerName NAME
    SetEnv APPLICATION_ENV "development"
    ServerAlias www.NAME
</VirtualHost>
```

change host mapping in windows/system32/drivers/etc/hosts to recognize your new path

`127.0.0.1 yourpath localhost`

create a new module under path/to/yourapp/module with the following basic folders

` /module
        /Album
            /config
            /src
                /Controller
                /Form
                /Model
            /view
                /album
                    /album`

in your src folder, create a Module.php file

```PHP
namespace Album;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
```

add your module to the autoloading in your composer.json file

```json
"autoload": {
    "psr-4": {
        "Application\\": "module/Application/src/",
        "Album\\": "module/Album/src/"
    }
},
```

run the autoload update command

`composer dump-autoload`

create a module.config file in the module config folder

```PHP
namespace Album;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\AlbumController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
```

now tell the module manager that we have a new module, yourapp/config/modules.config.php and add the name of your module to the array

```PHP
return [
    'Zend\Router',
    'Zend\Validator',
    'Application',
    'Album',
];
```

update the current config/module.config.php with the following route

```PHP
'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
```

create your ModuleController in the Controller folder with the action

```PHP
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
```
