# Wordpress Theme Development

Hooks in WordPress are built-in functions that allow you to insert your own code into WordPress at specific points during its execution. This makes it easier to modify or extend the functionality of WordPress without modifying the core files.

### There are two types of hooks:

1. Action Hooks
2. Filter Hooks

### How Hooks Work:

- Action Hooks allow you to perform actions (run code) at specific points.
- Filter Hooks let you modify data before it’s output or saved.

### Where Are Hooks Used?

Hooks when we want to run a custom function or modify a value at a specific point in WordPress, such as when:

- add custom functionality.
- change how something is displayed (like the content, title, etc.).
- perform specific actions (like sending an email after a form submission).

### How to Use Hooks in WordPress:

To use hooks, we need to:

Add a function that will run at the right point in WordPress.
Hook your function to the specific action or filter.

Example 1: Using an Action Hook
Let’s say you want to display a custom message after a post is published.

Create a function that will display the message:

```php
function my_custom_message_after_publish() {
    echo '<p>Thanks for reading our post!</p>';
}
```

Hook it to an action hook like publish_post:

```php
add_action('publish_post', 'my_custom_message_after_publish');
```

This will call the **my_custom_message_after_publish()** function every time a post is published.

Example 2: Using a Filter Hook
Let’s say you want to modify the title of a post before it’s displayed.

Create a function that modifies the title:

```php
function modify_post_title($title) {
    return 'Custom Title: ' . $title;
}
```

Hook it to a filter hook like the_title:

```php
add_filter('the_title', 'modify_post_title');
```

This will modify the title of the post before it’s displayed on the front end.

#### Imporatnt PHP concepts

1. Namespaces
   A namespace in PHP is a way of grouping related classes, interfaces, functions, and constants together. It helps avoid naming conflicts, especially in large applications or when using third-party libraries.

```php
// File 1: MyLibrary/Book.php
namespace MyLibrary;

class Book {
    public function title() {
        return "PHP for Beginners";
    }
}

// File 2: index.php
namespace MyApp;

use MyLibrary\Book;  // Importing the Book class from the MyLibrary namespace

$book = new Book();
echo $book->title();  // Outputs: PHP for Beginners
```

2. Autoloader
   In PHP, autoloader is a feature that automatically loads classes and files when they are needed, without requiring you to manually include them with include or require. This is often used for object-oriented programming to load classes as they are instantiated.

```php
// Example of an autoloader function
function myAutoloader($class) {
    include 'classes/' . $class . '.class.php';
}

// Register the autoloader function
spl_autoload_register('myAutoloader');
//or
spl_autoload_register(function($class) {
    include 'classes/' . $class . '.class.php';
});

// Now, when you instantiate a class, the file will be automatically loaded
$car = new Car(); // PHP will automatically load 'classes/Car.class.php'
```

3.  Traits
    A trait in PHP is a mechanism for code reuse in single inheritance languages like PHP. Traits allow you to include methods from one or more different classes into a single class. It helps to avoid code duplication without using inheritance.

```php
// Defining a trait
trait Logger {
    public function log($message) {
        echo "Log: " . $message;
    }
}

// Using the trait in a class
class MyClass {
    use Logger; // Include the methods of Logger trait
}

$obj = new MyClass();
$obj->log("This is a log message"); // Outputs: Log: This is a log message
```

4. Singleton
   The Singleton pattern is a design pattern that restricts the instantiation of a class to one object. This is useful when you want to ensure that only one instance of a class exists throughout your application (for example, for managing database connections).

```php
class Singleton {
    private static $instance;

    // Private constructor to prevent external instantiation
    private function __construct() {}

    // Public static method to get the single instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function doSomething() {
        echo "Doing something!";
    }
}

// Getting the singleton instance
$singleton1 = Singleton::getInstance();
$singleton1->doSomething();  // Outputs: Doing something!

$singleton2 = Singleton::getInstance();
// Outputs: Same instance
echo $singleton1 === $singleton2 ? 'Same instance' : 'Different instances';

```

Using trits to create a silginton

```php
trait singilton{
    public static function get_instance(){
        static  $instane =[];

        $called_class = get_called_calss();
        if(!isset($instance[$called_class])){
            $instance[$called_class]= new called_calss();
        }
        return $instance[$called_class];
    }

}
class User{
    Use singilton;
}
//dosn't matter how many time with create a objsect it will ony create on objcet
// and point towards them
$User_One = User::get_instance();
$User_Two = User::get_instance()
```

### Theme

##### Basic Theme structure

- parts/
  - footer.html
  - header.html
- patterns/
  - example.php
- styles/
  - example.json
- templates/
  - 404.html
  - archive.html
  - index.html (required)
  - singular.html
- README.txt
- functions.php
- screenshot.png
- style.css [required](https://developer.wordpress.org/themes/core-concepts/main-stylesheet/)
- theme.json

[Required Files](https://developer.wordpress.org/themes/core-concepts/theme-structure/#required-files)
[Optional Files](https://developer.wordpress.org/themes/core-concepts/theme-structure/#optional-files)
