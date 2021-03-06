<link rel="stylesheet" type="text/css"
      href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<style type="text/css">
    footer {
        margin-top: 70px;
    }
</style>
<div class="container" style="margin-top: 50px;">
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#user_profile_tab"
                                                      aria-controls="user_profile_tab" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#user_social_tab"
                                       aria-controls="user_social_tab" role="tab" data-toggle="tab" onclick="clearPasswordFields()">Social
                    Media</a></li>
            <li role="presentation"><a href="#user_gallery_tab"
                                       aria-controls="user_gallery_tab" role="tab" data-toggle="tab">Gallery</a></li>
            <li role="presentation"><a href="#user_password_tab"
                                       aria-controls="user_password_tab" role="tab" data-toggle="tab" onclick="clearPasswordFields()">Change
                    Password</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Basic Profile :: START -->
            <?php echo $this->render('Basic_Profile', ['profile_details' => $profile, 'cities' => $cities, 'languages' => $languages, 'categories' => $categories]); ?>
            <!-- Basic Profile :: END -->

            <!-- Social Media :: START -->
            <?php echo $this->render('Profile_SocialMedia', ['profile_details' => $profile]); ?>
            <!-- Social Media Tab :: END -->

            <!-- Gallery Tab :: START -->
            <?php echo $this->render('Gallery', ['gallery' => []]); ?>
            <!-- Gallery Tab :: TAB -->
            <?php echo $this->render('Profile_ChangePassword'); ?>
        </div>
    </div>
</div>
<script type="text/javascript"
src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript">
//                                           $(document).ready(function () {
//                                               var maxField = 10; //Input fields increment limitation
//                                               var addButton = $('.add_button'); //Add button selector
//                                               var wrapper = $('.field_wrapper'); //Input field wrapper
//                                               var fieldHTML = '<div class="form-group"><label class="col-sm-2">&nbsp;</label><div class="col-sm-8"><input type="text" name="field_name[]" value="" placeholder="Add Social Media Link" class="form-control"/></div><a href="javascript:void(0);" class="col-sm-2 remove_button" title="Remove field"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>'; //New input field html 
//                                               var x = 1; //Initial field counter is 1
//                                               $(addButton).click(function () { //Once add button is clicked
//                                                   if (x < maxField) { //Check maximum number of input fields
//                                                       x++; //Increment field counter
//                                                       $(wrapper).append(fieldHTML); // Add field html
//                                                   }
//                                               });
//                                               $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
//                                                   e.preventDefault();
//                                                   $(this).parent('div').remove(); //Remove field html
//                                                   x--; //Decrement field counter
//                                               });
//                                           });

                                           function clearPasswordFields() {
                                               //Change Password :: START
                                               $("#p_current_password").val("");
                                               $("#p_new_password").val("");
                                               $("#p_confirm_password").val("");
                                               $("#err_p_current_password").html("");
                                               $("#err_p_new_password").html("");
                                               $("#err_p_confirm_password").html("");
                                               //Change Password :: END
                                               //Social Media :: START
                                               $("#p_social_success").html("");
                                               $("#err_p_fb_link").val("");
                                               $("#err_p_tw_link").html("");
                                               $("#err_p_google_link").html("");
                                               $("#err_p_instagram_link").html("");
                                               $("#err_p_linkdin_link").html("");
                                               //Social Media :: END
                                               return true;
                                           }
</script>

