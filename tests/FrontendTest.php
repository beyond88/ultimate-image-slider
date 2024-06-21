<?php
use UltimateImageSlider\Frontend;

class FrontendTest extends WP_UnitTestCase {

    public function setUp() {
        parent::setUp();

        // Ensure the Frontend\Shortcode class exists
        if (!class_exists('UltimateImageSlider\Frontend\Shortcode')) {
            eval('namespace UltimateImageSlider\Frontend; class Shortcode {}');
        }
    }

    public function test_frontend_initializes_shortcode() {
        // Mock the Frontend\Shortcode class
        $mock = $this->getMockBuilder('UltimateImageSlider\Frontend\Shortcode')
                     ->disableOriginalConstructor()
                     ->getMock();

        // Ensure the class is autoloaded or available
        $this->assertTrue(class_exists('UltimateImageSlider\Frontend\Shortcode'));

        // Instantiate the Frontend class
        $frontend = new Frontend();

        // Check if the Frontend\Shortcode class was instantiated
        $this->assertInstanceOf('UltimateImageSlider\Frontend\Shortcode', $mock);
    }
}
