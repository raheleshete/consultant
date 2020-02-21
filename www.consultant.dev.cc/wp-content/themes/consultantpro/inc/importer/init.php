<?php
/**
 * Version 0.0.2
 */

require get_template_directory() . '/importer/consultant-importer.php'; //load admin theme data importer

if (!class_exists('consultant_Theme_Demo_Data_Importer')) {
    class consultant_Theme_Demo_Data_Importer extends consultant_Theme_Importer {

        /**
         * Holds a copy of the object for easy reference.
         *
         * @since 0.0.1
         *
         * @var object
         */
        private static $instance;

        /**
         * Set the key to be used to store theme options
         *
         * @since 0.0.2
         *
         * @var object
         */

        // Style 1
        public $theme_option_name1      = 'cs-framework-style-1.txt';
        public $content_demo_file_data1 = 'sample-data-style-1.xml';

        // Style 2
        public $theme_option_name2      = 'cs-framework-style-2.txt';
        public $content_demo_file_data2 = 'sample-data-style-2.xml';
        
        // Style 3
        public $theme_option_name3      = 'cs-framework-style-3.txt';
        public $content_demo_file_data3 = 'sample-data-style-3.xml';

        // Style 4
        public $theme_option_name4      = 'cs-framework-style-4.txt';
        public $content_demo_file_data4 = 'sample-data-style-4.xml';

        // Style 5
        public $theme_option_name5      = 'cs-framework-style-5.txt';
        public $content_demo_file_data5 = 'sample-data-style-5.xml';


    	/**
    	 * Holds a copy of the widget settings
    	 *
    	 * @since 0.0.2
    	 *
    	 * @var object
    	 */
    	public $widget_import_results;

        /**
         * Constructor. Hooks all interactions to initialize the class.
         *
         * @since 0.0.1
         */
        public function __construct() {

    		$this->demo_files_path = get_template_directory() . '/demo-files/';

            self::$instance = $this;
    		parent::__construct();

        }

    }
}
new consultant_Theme_Demo_Data_Importer;
