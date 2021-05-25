<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Generate HTML to PDF file with DomPDF library
 * 
 * @package     CodeIgniter
 * @author      Rizqi Setiaji
 * @license     MIT License
 * @link        https://github.com/rizqisetiaji7/ci_dompdf
 * @see         https://github.com/dompdf/dompdf
 * @category    Libraries
 */

// reference the Dompdf namespace
use Dompdf\Dompdf;

class Dompdf_gen {
    /**
     * CodeIgniter instance
     * @access protected
     */
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    /**
     * Print method to generate HTML into PDF
     * 
     * @access  public
     * @param   string  $view
     * @param   array   $data Store the view data
     * @param   string  $filename PDF file name output
     * @param   string  $paperSize the size of paper
     * @param   string  $orienntation the orientation of paper
     */

    public function print($view, $data = [], $filename = 'Doc', $paperSize = 'A4', $orientation = 'portrait') {
        // include autoloader
        require_once APPPATH.'third_party/dompdf/autoload.inc.php';
        $dompdf = new Dompdf();

        // Load html view and store data
        $dompdf->loadHtml($this->ci->load->view($view, $data, TRUE));

        // Set Paper Size and Orientation
        $dompdf->setPaper($paperSize, $orientation);

        // Render the HTML to PDF
        $dompdf->render();

        // Output the genrated PDF to Browser
        $dompdf->stream($filename.'.pdf',['Attachment' => FALSE]);
    }
}