<?php
/**
 * This controller contains the actions allowing a manager to list and manage overtime requests
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license      http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link            https://github.com/bbalet/jorani
 * @since         0.1.0
 */

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

/**
 * This class loads the actions allowing a manager to list and manage overtime requests
 */
class HolidayCalendar extends CI_Controller {

    /**
     * Default constructor
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function __construct() {
        parent::__construct();
        setUserContext($this);

    }

    /**
     * Display the list of all overtime requests submitted to the connected manager.
     * Status is submitted or accepted/rejected depending on the filter parameter.
     * @param string $name Filter the list of submitted overtime requests (all or requested)
     * @author Benjamin BALET <benjamin.balet@gmail.com>
     */
    public function index() {
        
        $data = getUserContext($this);
        $data['title'] = "Holiday Calendar";
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('holidaycalendar/index', $data);
        $this->load->view('templates/footer');
    }


}
