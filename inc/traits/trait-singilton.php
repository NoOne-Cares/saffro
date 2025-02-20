<?php
namespace SAFFRO_THEME\Inc\Traits;

trait Singilton{
    protected function __construct(){

    }
    public function __clone(){

    }

    final public static function get_instance(){
        static $instance = [];

		/**
		 * If this trait is implemented in a class which has multiple
		 * sub-classes then static::$_instance will be overwritten with the most recent
		 * sub-class instance. Thanks to late static binding
		 * we use get_called_class() to grab the called class name, and store
		 * a key=>value pair for each `classname => instance` in self::$_instance
		 * for each sub-class.
		 */
        $called_class = get_called_class();
        
        

        // Extract the class name by removing the namespace
        // $called_class_e = explode('\\', $called_class_name);
        // $class_name = array_pop($called_class_e); // Get the class name without namespace
        // print_r($called_class);

		if ( ! isset( $instance[ $called_class ] ) ) {

			$instance[ $called_class ] = new $called_class();

			/**
			 * Dependent items can use the `aquila_theme_singleton_init_{$called_class}` hook to execute code
			 */
			do_action( sprintf( 'aquila_theme_singleton_init_%s', $called_class ) );
             // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

		}

		return $instance[ $called_class ];
    }
}



// namespace SAFFRO_THEME\Inc\Traits;

// trait Singleton {
//     protected function __construct() {
//         // Constructor logic (if needed)
//     }

//     public function __clone() {
//         // Prevent cloning of singleton
//     }

//     final public static function get_instance() {
//         static $instance = [];

//         // Get the full class name including the namespace
        // $called_class_name = get_called_class();
        
        // // Extract the class name by removing the namespace
        // $called_class = explode('\\', $called_class_name);
        // $class_name = array_pop($called_class); // Get the class name without namespace
        
//         // If instance doesn't exist for this class, create it
//         if ( ! isset( $instance[ $class_name ] ) ) {
//             $instance[ $class_name ] = new $called_class_name();

//             // Dependent items can use the `saffro_theme_singleton_init_{$called_class}` hook to execute code
//             do_action( sprintf( 'saffro_theme_singleton_init_%s', $called_class_name ) );
//         }

//         return $instance[ $class_name ];
//     }
// }
