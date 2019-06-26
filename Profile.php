<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Profile extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_model');
    $this->load->model('Register_model');

  }
  function index()
  {
        $this->load->view('profile');
  }
  function profiledetails()
  {
    $_POST             = json_decode(file_get_contents('php://input'),true);
    $emailsettings     = $_POST['emailsettings'];
    $language          = $_POST['language'];
    $locale            = $_POST['locale'];
    //$Image             = "default.jpg";
    $usermail          = $this->session->userdata('useremail');
    if($usermail){
      $if_exist =$this-> Profile_model-> checkAccountExist($usermail);
       if($if_exist){
        $userrprofiledetails = array('EmailId'       => $usermail,
                                     'EmailSettings' => $emailsettings,
                                     'Language'      => $language,
                                     'Locale'        => $locale
                                     //'Image'         => $Image
                                       );
        $result  = $this-> Profile_model-> updateprofile($userrprofiledetails,$usermail);
        echo json_encode($result);
      }
      else{
        $userrprofiledetails = array('EmailId'       => $usermail,
                                     'EmailSettings' => $emailsettings,
                                     'Language'      => $language,
                                     'Locale'        => $locale
                                     //'Image'         => $Image
                                       );
        $result  = $this-> Profile_model-> insertprofile($userrprofiledetails,$usermail);
        echo json_encode($result);
      }
    }
    else {
       $result = "2";
       echo json_encode($result);
    }
  }
  function imageUpload(){
    $_POST  = json_decode(file_get_contents('php://input'),true);
          if(!empty($_FILES['image'])){
      		            $ext   = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                      $image = time().'.'.$ext;
                      move_uploaded_file($_FILES["image"]["tmp_name"], 'assets/images/'.$image);
                    	}
          else{
        	  	echo "Image Is Empty";
        	}
    $userimage             = $_POST['image'];
    $usermail              = $this->session->userdata('useremail');
    if($usermail){
    $if_exist =$this-> Profile_model-> checkAccountExist($usermail);
    if($if_exist){
    if($image){
      $userimage = array('Image' => $image,
                          'EmailId' => $usermail);
      $result = $this-> Profile_model-> updateimage($userimage,$usermail);
      echo json_encode($result);
    }
    else {
      $result="false";
      echo json_encode($result);
    }
  }
  else{
    if($image){
      $userimage = array('Image' => $image,
                          'EmailId' => $usermail);
      $result = $this-> Profile_model-> insertimage($userimage,$usermail);
      echo json_encode($result);
   }
  }
}
else{
  $result="session value is null";
  echo json_encode($result);
}

}
  function getAccount(){
    $useremail         = $this->session->userdata('useremail');
    $result              = $this-> Profile_model-> getaccount($useremail);
    echo json_encode($result);
  }

  function chengepassword()
  {
    $_POST             = json_decode(file_get_contents('php://input'),true);
    $useremail         = $this->session->userdata('useremail');
    $password          = $_POST['password'];
      $oldpassword       = md5($_POST['oldPassword']);

    $encryptedpassword = md5($password);
    $result            = 2;
    $shuffled          = str_shuffle($password);
    $usercheck         = $this->Register_model->checkuserexists($useremail);
      if($usercheck)
      {
             $checkoldpassword = $this->Profile_model->checkoldpassword($useremail,$oldpassword);
          if($checkoldpassword)
          {
           $userregisterdetails = array('Password' => $encryptedpassword);
           $result1          = $this->Profile_model-> changepassword($userregisterdetails,$useremail);
            $result = array('message' => 'true');
           echo json_encode($result);
         }
         else {
            $result = array('message' => $checkoldpassword);
         echo json_encode($result);
         }
      }
      else {
        $result = array('message' => 'nouser');
         echo json_encode($result);
      }
    }
    
    function getContries(){
       $result     = $this-> Profile_model-> getcontries();
       echo json_encode($result);
    }
    function getCorrency(){
       $result     = $this-> Profile_model-> getcorrency();
       echo json_encode($result);
    }
    function companyDetails(){
      $_POST                = json_decode(file_get_contents('php://input'),true);
      $companysetup         = $_POST['companysetup'];
      $cartonsetup          = $_POST['cartonsetup'];
      $ratesetup            = $_POST['exchangeratesetup'];
      // $thirdcorrency =  $_POST['cartonsetup']['Thirdcorrency'];
      // $dollarthird   =  $_POST['cartonsetup']['Dollerthirdcorrency'];
      $agentemail=$_POST['companysetup']['AgentEmail'];
      //if($agentemail==)


    //  $log                  = $this->session->authkey('userToken');
      $log                  = $this->session->userdata('userToken');
      $usermail             = $this->session->userdata('useremail');
       $log="Make me fill";



       $companyprofiledetails = array('CompanyName'     => $_POST['companysetup']['CompanyName'],
                                    'Country'           => $_POST['companysetup']['Contry'],
                                    'AddressType'       => $_POST['companysetup']['Documentation'],
                                    'Address'           => $_POST['companysetup']['Address'],
                                    'ZipCode'           => $_POST['companysetup']['Zipcode'],
                                    'Phone'             => $_POST['companysetup']['Phone'],
                                    'Mobile'            => $_POST['companysetup']['Mobile'],
                                    'Fax'               => $_POST['companysetup']['Fax'],
                                    'Skype'             => $_POST['companysetup']['SkypeName'],
                                    'MsnID'             => $_POST['companysetup']['MSNid'],
                                    'QqID'              => $_POST['companysetup']['QQid'],
                                    'OrderEmail'        => $usermail,
                                    'AgentEmail'        => $_POST['companysetup']['AgentEmail'],
                                    'AgentId'           => $_POST['companysetup']['AgentId'],
                                    'AgentName'           => $_POST['companysetup']['AgentName'],

                                    

                                    'ExchangeRate'            => $_POST['cartonsetup']['DollerRMB'],
                                    'Active3dCurrency'       => $_POST['cartonsetup']['Thirdcorrency'],
                                    'ThirdCurrency'           => $_POST['cartonsetup']['Corrency'],
                                    'ExchangeRate3dCurrency' => $_POST['cartonsetup']['Dollerthirdcorrency'],
                                    'TransilateFrom'          => $_POST['cartonsetup']['TranslateFrom'],
                                    'TransilateTo'            => $_POST['cartonsetup']['TranslateTo'],

                                    'GrossweightCarton'      => $_POST['exchangeratesetup']['Grossweight'],
                                    '	Width'                 => $_POST['exchangeratesetup']['Width'],
                                    'Height'                 => $_POST['exchangeratesetup']['Height'],
                                    'Length'                 => $_POST['exchangeratesetup']['Lenght'],
                                    'Volume'                 => $_POST['exchangeratesetup']['Volume']
                                    
                                    );
       $companyexist = $this-> Profile_model-> checkcompanydetails($usermail);
       if($companyexist){
         $result     = $this-> Profile_model-> updatecompanydetails($companyprofiledetails,$usermail);
         echo json_encode($result);
       }
       else{
         $result     = $this-> Profile_model-> addcompanydetails($companyprofiledetails);
         echo json_encode($result);
       }
    }
    function getCompanyDetails()
    {
      $usermail   = $this->session->userdata('useremail');//take value from session
      $result     = $this-> Profile_model-> getCompanyDetails($usermail);
      echo json_encode($result);
    }
     function getCartonvalues()
    {
      //$usermail   = $this->session->userdata('useremail');//take value from session
      $result     = $this-> Profile_model-> getCartonvalues();
      echo json_encode($result);
    }
    function getallgoldagents()
    {
      //$usermail   = $this->session->userdata('useremail');//take value from session
      $goldagents     = $this-> Profile_model-> getallgoldagents();

      foreach ($goldagents as $key) {
       $goldagentcontact=$this-> Profile_model-> getgoldagentcontats($key->Id);
       $key->contact=$goldagentcontact;
      }
      echo json_encode($goldagents);
    }
}
