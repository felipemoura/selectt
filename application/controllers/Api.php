<?php defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Api extends REST_Controller{

    function __construct()
    {
        parent::__construct();
        

        if ( $this->session->userdata("logged_in") != 1 ) 
        {
            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Sorry, this is only for logged users. Log in First !</div>');   
            redirect(base_url('login'));  
        } 

        if ( $this->session->userdata("is_verifyed") != 1 )  
        {
            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center">Your account is not verified yet, please verify it. </div>');   
            redirect(base_url('login'));                
        } 

        $this->load->model('Technique_model', 'technique');
        $this->load->model('User_model', 'user');
    }


    // *********************************************************************************************************
    // ******************************************       TECHNIQUE        ***************************************
    // *********************************************************************************************************
    function technique_get()
    {
        if(!$this->get('id'))
        {
            $this->response('You must provide an ID to get technique info', 400);
        }

        $technique = $this->technique->buildTechnique ($this->get('id'));

        if($technique)
        {
            $this->response($technique, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response('Technique not found on database', 404);
        }
    }

    function techniques_get()
    {
        $techniques = $this->technique->buildTechniques();

        if($techniques)
        {
            $this->response($techniques, 200);
        }

        else
        {
            $this->response('There was a problem with the database, please try again later', 404);
        }
    }

	
    function tableinfo_get()
    {
        if(!$this->get('table'))
        {
            $this->response('You must provide table name', 400);
        }

        $table = $this->technique->singleTableInfo ($this->get('table'));

        if($table)
        {
            $this->response($table, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response('Table not found on database', 404);
        }
    }

    function tablesinfo_get()
    {
        $table = $this->technique->tablesInfo ();

        if($table)
        {
            $this->response($table, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response('There was a problem with the database, please try again later', 404);
        }
    }



    // *********************************************************************************************************
    // ******************************************       USER        ********************************************
    // *********************************************************************************************************
    function user_get()
    {

        if (!$this->session->userdata('is_admin')) {
            $this->response('You don\'t have permission.', 400);
        }

        if(!$this->get('id'))
        {
            $this->response('You must provide an ID to get user info', 400);
        }

        $user = $this->user->buildUser ($this->get('id'));

        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response('User not found on database', 404);
        }
    }

}

?>