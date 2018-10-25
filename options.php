<!DOCTYPE html>
<html>
  <head>
    
<?php include('assets.php') ?>

<link rel="stylesheet" href="/css/toggle.css">
  </head>
  <body>
  <section class="hero is-primary  is-bold is-large">
   
   <?php include('header.php') ?>

<?php 
if (!class_exists('Options')) {
  require('Models\Options.php');
}


if (isset($_POST['options_save'])) {
  Options::save();
}

?>
   <?php


  $options = Options::get();


  $css = $options ? $options->ui : '';
  $g_lic = $options ? $options->google : '';
  $f_lic = $options ? $options->flickr : '';
  $en_auto_blog = $options ? $options->auto_blog : '';
  $ui = $options ? $options->ui : 'default';
  $videosize = $options ? $options->video : '768x576';

  ?>

  <div class="hero-body">
    <div class="container has-text-centered">
       

       <form name="select" method="post" class="box">
       





<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">UI THEME</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <div class="select is-fullwidth">

          <select name="ui">
 <option value="default" <?= ($ui == 'default') ? 'selected' : '' ?>>default</option>
 <option value="darkly" <?= ($ui == 'darkly') ? 'selected' : '' ?>>Darkly</option>
 <option value="cosmo" <?= ($ui == 'cosmo') ? 'selected' : '' ?>>Cosmo</option>
 <option value="lumen" <?= ($ui == 'lumen') ? 'selected' : '' ?>>Lumen</option>
 <option value="solar" <?= ($ui == 'solar') ? 'selected' : '' ?>>Solar</option>
 <option value="materia" <?= ($ui == 'materia') ? 'selected' : '' ?>>Materia</option>
 <option value="yeti" <?= ($ui == 'yeti') ? 'selected' : '' ?>>Yeti</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Google Image Search</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <div class="select is-fullwidth">
          <select name="google">
 <option value="">--- Select ---</option>
    	<option value="no_licensing" <?php if ($g_lic == 'no_licensing') { ?>selected="selected"<?php 
                                                                                          } ?>>No Licensing</option>
    	<option value="cc_public_domain" <?php if ($g_lic == 'cc_public_domain') { ?>selected="selected"<?php 
                                                                                                  } ?>>Creative Commons Public Domain</option>
    	<option value="cc_attribute" <?php if ($g_lic == 'cc_attribute') { ?>selected="selected"<?php 
                                                                                          } ?>>Creative Commons Attribute</option>
    	<option value="cc_sharealike" <?php if ($g_lic == 'cc_sharealike') { ?>selected="selected"<?php 
                                                                                            } ?>>Creative Commons Share Alike</option>
    	<option value="cc_noncommercial" <?php if ($g_lic == 'cc_noncommercial') { ?>selected="selected"<?php 
                                                                                                  } ?>>Creative Commons Non-Commercial</option>
    	<option value="cc_nonderived" <?php if ($g_lic == 'cc_nonderived') { ?>selected="selected"<?php 
                                                                                            } ?>>Creative Commons Non-Derived</option>                                                                  } ?>>Yellow</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Flickr Image Search</label>
  </div>
  <div class="field-body">
    <div class="field is-narrow">
      <div class="control">
        <div class="select is-fullwidth">
          <select name="flickr">
<option value="">--- Select ---</option>
    	<option value="no_licensing" <?php if ($f_lic == 'no_licensing') { ?>selected="selected"<?php 
                                                                                          } ?>>No Licensing</option>
    	<option value="0" <?php if ($f_lic == '0') { ?>selected="selected"<?php 
                                                                    } ?>>All Rights Reserved</option>
    	<option value="4" <?php if ($f_lic == '4') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution</option>
    	<option value="6" <?php if ($f_lic == '6') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution-NoDerivs</option>
    	<option value="3" <?php if ($f_lic == '3') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution-NonCommercial-NoDerivs</option>
    	<option value="2" <?php if ($f_lic == '2') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution-NonCommercial</option>
    	<option value="1" <?php if ($f_lic == '1') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution-NonCommercial-ShareAlike</option>
    	<option value="5" <?php if ($f_lic == '5') { ?>selected="selected"<?php 
                                                                    } ?>>Attribution-ShareAlike</option>
    	<option value="7" <?php if ($f_lic == '7') { ?>selected="selected"<?php 
                                                                    } ?>>No Known Copyright Restrictions</option>
    	<option value="8" <?php if ($f_lic == '8') { ?>selected="selected"<?php 
                                                                    } ?>>United States Government Work</option>                                                                               } ?>>Creative Commons Non-Derived</option>                                                                  } ?>>Yellow</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="field is-horizontal">
  <div class="field-label">
     <label class="label">Select Inserted Video Dimensions Preset</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
      <div class="select">
        <select name="video">
    	<option value="320x240" <?php if ($videosize == '320x240') { ?>selected="selected"<?php 
                                                                                    } ?>>320x240 (standard web)</option>   
        <option value="448x336" <?php if ($videosize == '448x336') { ?>selected="selected"<?php 
                                                                                        } ?>>448x336</option>  
        <option value="480x360" <?php if ($videosize == '480x360') { ?>selected="selected"<?php 
                                                                                        } ?>>480x360</option>  
        <option value="640x480" <?php if ($videosize == '640x480') { ?>selected="selected"<?php 
                                                                                        } ?>>640x480</option>  
        <option value="768x576" <?php if ($videosize == '768x576') { ?>selected="selected"<?php 
                                                                                        } ?>>768x576</option>   	
    </select>
    </div>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label">
    <!-- Left empty for spacing -->
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <button name="options_save" type="submit" class="button is-primary">
          Save
        </button>
      </div>
    </div>
  </div>
</div>

       </form>

     
     <?php include 'inc/seo_options.php'; ?>


    </div>
  </div>
</section>

  </body>
</html>
