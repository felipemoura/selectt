<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Felipe Moura">
    
  <link rel="stylesheet" type="text/css" href="<? echo base_url("assets/media/lib/bootstrap-3/bootstrap.min.css");?>">
  <link rel="stylesheet" type="text/css" href="<? echo base_url("assets/css/animate.css");?>">
  <link rel="stylesheet" type="text/css" href="<? echo base_url("assets/css/custom.css");?>">

  <?php if($this->uri->segment(1)=="insert_test" || $this->uri->segment(1)=="teste"){
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/tagsinput/bootstrap-tagsinput-typeahead.css") . '">';
    echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/tagsinput/bootstrap-tagsinput.css") . '">';
  }?>


<?php if ($this->uri->segment(2)=="weights"){
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/jqueryui/jquery-ui.theme.css") . '">';
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/jqueryui/jquery-ui.min.css") . '">';
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/css/bootstrap-slider.min.css") . '">';
}?>


<?php if( ($this->uri->segment(2)=="users") || ($this->uri->segment(2)=="techniques") ){
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/media/datatables/css/dataTables.bootstrap.min.css") . '">';
}?>

<?php if($this->uri->segment(1)=="admin"){
  echo '<link rel="stylesheet" type="text/css" href="' . base_url("assets/css/admin.css") . '">';
}?>

  <link rel="manifest" href="<? echo base_url("assets/fav/manifest.json");?>">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<? echo base_url("assets/fav/ms-icon-144x144.png");?>">
  <meta name="theme-color" content="#ffffff">

  <link rel="apple-touch-icon" sizes="180x180" href="<? echo base_url('assets/fav/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<? echo base_url('assets/fav/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<? echo base_url('assets/fav/favicon-16x16.png') ?>">
  <link rel="manifest" href="<? echo base_url('assets/fav/manifest.json') ?>">
  <link rel="mask-icon" href="<? echo base_url('assets/fav/safari-pinned-tab.svg') ?>" color="#5bbad5">
  <link rel="shortcut icon" href="<? echo base_url('assets/fav/favicon.ico') ?>">
  <meta name="msapplication-config" content="<? echo base_url('assets/fav/browserconfig.xml') ?>">
  <meta name="theme-color" content="#ffffff">
  <title>Selectt</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?= base_url('logged');?>">
          <img alt="Brand" src="<? echo base_url("assets/photos/selectt.png");?>" style="max-width:100px; margin-top: -7px;">
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php if($this->uri->segment(1)=="insert_test") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('insert_test');?>">Insert Technique</a>
          </li>

          <li <?php if($this->uri->segment(1)=="form") {   echo 'class="active"';     }?>>
            <a href="<?= base_url('form');?>">Fill Form</a>
          </li>

          <li <?php if($this->uri->segment(1)=="results") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('results');?>">Results</a>
          </li>

        <? if ($this->session->userdata('is_admin')) : ?>
          <!-- Only if Admin page -->
          <li <?php if($this->uri->segment(1)=="admin") {  echo 'class="active"';   }?>>
            <a href="<?= base_url('admin');?>">Admin</a>
          </li>
        <? endif; ?>
        </ul>


        <button onclick="location.href='<?= base_url('login/logout');?>'" class="btn btn-danger pull-right" type="submit" id="btnLogout">Logout</button>
        <div class="pull-right" style="margin: auto; padding-top: 13px; padding-right: 20px;">Welcome, <? echo $this->session->userdata('name'); ?></div> 
     
      </div>

    </div>
  </nav>


<style type="text/css">
hr.line { 
  height: 30px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 1px 0 0 0; 
  border-radius: 20px; 
} 
hr.line:before { 
  display: block; 
  content: ""; 
  height: 30px; 
  margin-top: -31px; 
  border-style: solid; 
  border-color: #8c8b8b; 
  border-width: 0 0 1px 0; 
  border-radius: 20px; 
}
.bootstrap-tagsinput {
    width: 100%;
    /*min-height: 20px;*/
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 422px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>

<div class="container animated fadeIn">

  <h1>Pagina de Teste</h1>

  <? echo form_open ('teste/postado') ?>

  <!-- INIT Title -->
      <div class="row">
        <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
          <!-- Title -->
          <div class="form-group title">
            <label for="title">Title</label>    

            <input type="text" class="form-control typehead" id="title" name="title" data-role="tagsinput" >

            <small>The Title of the project published</small>
            <span class="text-danger"></span>
          </div>
        </div>
    <!-- END Title -->

    <!-- BIBITEXT Title -->
      <div class="row">
        <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
          <!-- Title -->
          <div class="form-group bibTex">
            <label for="bibTex">BibTex</label>    

            <input type="text" class="form-control typehead" id="bibTex" name="bibTex" data-role="tagsinput">

            <small>The BibTex of the project published</small>
            <span class="text-danger"></span>
          </div>
        </div>

    <!-- BIBITEXT Title -->
      <div class="row">
        <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
          <!-- Title -->
          <div class="form-group output">
            <label for="output">output</label>    

            <input type="text" class="form-control typehead" id="output" name="output" data-role="tagsinput">

            <small>The output of the project published</small>
            <span class="text-danger"></span>
          </div>
        </div>
        
    <!-- END Title -->

    <span id="answer"></span>

  	<!-- Submit Form -->
    <button type="submit" style="margin-top: 30px; width: 700px;" class="btn btn-block btn-success">Save Weights</button>
  </form>
</div>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>

<script src="<?= base_url('assets/media/lib/typeahead.js/typeahead.bundle.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/media/tagsinput/bootstrap-tagsinput.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">

  // $(document).ready( function () {

    // var execution;
    // var data;
    // var httpRequest;
    
    // if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    //   httpRequest = new XMLHttpRequest();
    // } else if (window.ActiveXObject) { // IE 8 and older
    //   httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    // }

    // httpRequest.onreadystatechange = function(){
    //   if (httpRequest.readyState === 4) {
    //     if (httpRequest.status === 200) {
    //       execution = JSON.parse(httpRequest.responseText);
    //       console.log(execution);
    //       data = execution;
    //       $('#answer').append(JSON.stringify(JSON.parse(httpRequest.responseText), null, 2));
    //     } else {
    //       alert('There was a problem with the request.');
    //     }
    //   }
    // };

    // httpRequest.open('GET', window.location.origin + '/selectt/api/tablesInfo', false);
    // httpRequest.send(null);

  // });

  var executionPlatform = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '../selectt/api/tableInfo/table/ExecutionPlatform',
    remote: {
      url: '../selectt/api/tableInfo/table/%QUERY.json',
      wildcard: '%QUERY'
    }
  });

  var programmingLanguage = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
      url: '../selectt/api/tableInfo/table/ProgrammingLanguage'
    }
  });

  var output = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
          remote: {
        url: '../selectt/api/tableInfo/table/Output'
      }
    });

  executionPlatform.initialize();
  programmingLanguage.initialize();
  output.initialize();

  $("#title").tagsinput({
    typeaheadjs: [{
      hint: false,
      highlight: true,
      minLength: 0,
      prefetch: {url: '../selectt/api/tableInfo/table/ExecutionPlatform', ttl: '0'},
    },{
      name: 'executionPlatform',
      source: executionPlatform.ttAdapter()
    }]
  });  

  $("#bibTex").tagsinput({
    typeaheadjs: [{
      hint: false,
      highlight: true,
      minLength: 1
    },{
      name: 'programmingLanguage',
      source: programmingLanguage.ttAdapter()
    }],
    freeInput: true
  });

  $("#output").tagsinput({
    typeaheadjs: [{
      hint: false,
      highlight: true,
      minLength: 1
    },{
      name: 'output',
      source: output.ttAdapter()
    }],
    freeInput: true
  });

  $(".title input").blur(function(){
    // $('input').tagsinput('refresh');
      // alert($(this).val());
     $('#title').tagsinput('add', $(this).val());
     $(this).val('');

  });

  $(".bibTex input").blur(function(){
    // $('input').tagsinput('refresh');
      // alert($(this).val());
     $('#bibTex').tagsinput('add', $(this).val());
     $(this).val('');
  });

  $(".output input").blur(function(){
    // $('input').tagsinput('refresh');
      // alert($(this).val());
     $('#output').tagsinput('add', $(this).val());
     $(this).val('');
  });
  // setInterval(function(){  console.log($("#title").val()); }, 500);

// $("#title").focusout(function(){
//   var text = $('#title').text();
//   text.val(text.val() + ' after clicking');
// });



//    var data = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
//   'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
//   'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
//   'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
//   'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
//   'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
//   'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
//   'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
//   'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
// ];

//     var states = new Bloodhound({
//       datumTokenizer: Bloodhound.tokenizers.whitespace,
//       queryTokenizer: Bloodhound.tokenizers.whitespace,

//       local: data
//       // remote: {
//       //   url: '../selectt/api/tableInfo/table/ExecutionPlatform'
//       // }
//     });

//     states.initialize();

    // var defaultOptions = {
    //   tagClass: function(item) {
    //     return 'label label-info';
    //   },
    //   focusClass: 'focus',
    //   itemValue: function(item) {
    //     return item ? item.toString() : item;
    //   },
    //   itemText: function(item) {
    //     return this.itemValue(item);
    //   },
    //   itemTitle: function(item) {
    //     return null;
    //   },
    //   freeInput: true,
    //   addOnBlur: true,
    //   maxTags: undefined,
    //   maxChars: undefined,
    //   confirmKeys: [13, 44],
    //   onTagExists: function(item, $tag) {
    //     $tag.hide().fadeIn();
    //   },
    //   trimValue: false,
    //   allowDuplicates: false,
    //   triggerChange: true,
//       typeaheadjs: [{
//         hint: true,
//         highlight: true,
//         minLength: 1,
//         templates: {
//           notFound: [
//           '<div class="empty-message">',
//           'unable to find any Best Picture winners that match the current query',
//           '</div>'
//           ].join('\n'),
//           suggestion: function(data) {
//             return '<p><strong>' + data  + '</strong></p>';
//           }
//         }
//       },{
//         name: 'states',
//         source: states.ttAdapter()
//       }]
//     };

//     $('#title').tagsinput(
//       defaultOptions
//     );

//     $('#bibTex').tagsinput(
//       defaultOptions
//     );



</script>
<!-- END OF IT  -->
</body>
</html>