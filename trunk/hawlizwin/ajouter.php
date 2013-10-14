<?php include("src/utils.php"); 
$active_accueil = false;
$active_participer = true;
$active_galerie = false;
?>
<?php include("fb-login.php"); ?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Participer - 7awliZwin.com</title>
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link href="css/style2.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Generic page styles -->
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/jquery.fileupload.css">

    <script src="js/jquery.js"></script>
    <style type="text/css">
        ul, ol {
            margin-bottom: 0px;
        }
    </style>
    <script>
            $(document).ready(function() {

                $("#submit_form").click(function(){
                    if($("#photo").val()=="") {
                        alert("Vous n'avez pas ajouté de photo");
                        return false;
                    }
                    if($("#prix").val() > 5000 || $("#prix").val() < 900) {
                        alert("Veuillez saisir un prix correct");
                        return false;
                    }
                });
 
                // au début on récupère les regions
                $.ajax({
                    url: 'src/liste.php', // lien vers la page de traitement sur le serveur
                    data: 'debut', // on envoie $_GET['debut'] pour signaler le début
                    dataType: 'json', // on veut un retour JSON
                    success: function(json) {
                        $.each(json, function(index, value) { // pour chaque noeud JSON
                            // on ajoute l option dans la liste
                            $('#regions').append('<option value="'+ index +'">'+ value +'</option>');
                        });
                    }
                });
                // On récupère la liste des villes
                $.ajax({
                            url: 'src/liste.php', // lien vers la page de traitement sur le serveur
                            data: 'id=1', // on envoie $_GET['id'] l'id de la region
                            dataType: 'json', // on veut un retour JSON
                            success: function(json) {
                                $.each(json, function(index, value) { // on ajoute l option dans la liste
                                    $('#ville').append('<option value="'+ index +'">'+ value +'</option>');
                                });
                            }
                        });
 
                // si la liste des régions change
                $('#regions').on('change', function() {
                    var val = $(this).val(); // on récupère l'id de la région
 
                    if(val != '') {
                        $('#ville').empty(); // on vide la liste des villes
 
                        $.ajax({
                            url: 'src/liste.php', // lien vers la page de traitement sur le serveur
                            data: 'id='+ val, // on envoie $_GET['id'] l'id de la region
                            dataType: 'json', // on veut un retour JSON
                            success: function(json) {
                                $.each(json, function(index, value) { // on ajoute l option dans la liste
                                    $('#ville').append('<option value="'+ index +'">'+ value +'</option>');
                                });
                            }
                        });
                    }
                });
            });
 
       </script>
<?php include_once("src/mixpanel.php") ?>  

<a href="http://www.thefeedbackbutton.com/feedback/ebdc91b2604052" class="the-feedback-button">Une erreur ?</a>
<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://cdn.thefeedbackbutton.com/assets/button/v2.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","the-feedback-button-js");</script>
</head>
<body>
    <?php include("header.php"); ?>

    <div id="list-photo">
        <?php if ($user): 
            $email = $user_profile["email"];
            $sth = $dbh->prepare("SELECT * FROM users WHERE email ='$email'");
            $sth->execute();
            $result = $sth->fetch();
            $userid = $result["id"];
            $sth = $dbh->prepare("SELECT * FROM photos WHERE userid ='$userid'");
            $sth->execute();

            /* Récupération de toutes les lignes d'un jeu de résultats */
            
            if($sth->rowCount() == 0):
        ?>
        
            <div style="width:100%; text-align:center; margin-top:28px; margin-bottom:23px;"><img src="img/etape2.png"></div>
            <div style="width:100%; text-align:center; margin-bottom:23px;"><img src="img/separator.png"></div>

            <div class="row" style="margin-left: 10px;">
              <div class="col-md-6" style="width:390px">
                <div style="display:table; height:309px; overflow: hidden; width: 100%; background-color: white; border: solid 1px #E5E5E5; border-radius: 4px;"> 
                    <div style="display:table-cell; vertical-align:middle; width:100%; margin:0 auto; text-align:center; padding-top:12px">
                      <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Ajouter la photo</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]" multiple>
                    </span>
                    <br /><br />
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                   </div> 
                </div> 
                
              </div>
              <div class="col-md-6">
                <div style="display:table; height:309px; overflow: hidden; width: 100%; "> 
                    <div style="display:table-cell; vertical-align:middle; width:100%; margin:0 auto; padding-top:12px">

                <form action="validform.php"
                    method="post">
                    <input type="hidden" name="photo" id="photo" /> 
                    <fieldset>
                        <label for="prix">Bch7al had l'mbrouk ?</label>
                        <input type="prix" id="prix" name="prix" class="form-control" placeholder="Prix..." style="width:28%;display: inline;" required/> DHs
                    </fieldset>
                    
                    <fieldset>
                        <label for="ville">Mnin Chritih ?</label>
                        <select id="regions" name="regions" class="form-control" style="margin-right: 8px;
width: 46%;display: inline;">
                            
                        </select>
                        <select id="ville" name="ville" class="form-control" style="margin-right: 8px;
width: 48%;display: inline;">
                            
                        </select>
                    </fieldset>
                    
                    <fieldset style="text-align:right;">
                        <input type="submit" id="submit_form" value="C'est parti !" class="btn btn-success" style="margin-right: 10px;"/>
                    </fieldset>
                </form> 

                <i>Note: Si vous rencontrez une erreur, vous pouvez la signaler avec le bouton collé à droite</i>
              </div>
              </div>
              </div>
            </div>


        
        
        <?php else:

            $sth = $dbh->prepare("SELECT * FROM photos WHERE userid ='".$result['id']."'");
                $sth->execute();
                $photo = $sth->fetch();
            ?>
            Vous avez déjà participé, redirection ...
<meta http-equiv="Refresh" content="0;url=http://7awlizwin.com/participation.php?id=<?php echo $photo["id"]; ?>">
            <?php
         endif ?>


        <?php else: ?>
            <div id="connect">
            <p>
                Utilisez votre compte Facebook pour vous connecter en 1 clic ;)
            </p>
            <?php
                $loginUrl = $facebook->getLoginUrl(
                    array('scope' => 'email',
                    'redirect_uri' => 'http://7awlizwin.com/ajouter.php')
                  );
            ?>
            <a href="<?php echo $loginUrl; ?>" class="fb-button-container-reg">
                <div class="pluginSkinLight">
                    <div class="pluginLoginButton pluginLoginButtonXlarge">
                        <div>
                            <div class="pluginFaviconButton pluginFaviconButtonXlarge" id="u4wmlh_1">
                                <table class="uiGrid" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <i class="pluginFaviconButtonIcon img sp_login-button sx_login-button_xlarge"></i>
                                                <i class="pluginFaviconButtonIconActive img sp_login-button sx_login-button_xlargea"></i>
                                            </td>
                                            <td>
                                                <span class="pluginFaviconButtonBorder">
                                                    <span class="pluginFaviconButtonText fwb">Se connecter avec Facebook</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </a>
          </div>

        <div id="progress">
            <div>
                <p>
                    Capturez votre "7awli" 
                </p>
                <div>
                    <img src="img/camera.png"/>
                </div>
            </div>
            <div>
                <p>
                    Partagez votre photo 
                </p>
                <div>
                    <img src="img/mail.png"/>
                </div>
            </div>
            <div>
                <p>
                    Et gagnez
                </p>
                <div>
                    <img src="img/gift.png"/>
                </div>
            </div>
        </div>

    <?php endif ?>

    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    var uploads = 0;
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Chargement en cours...')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        limitMultiFileUploads:1,
        singleFileUploads:true,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 200,
        previewMaxHeight: 200,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        if(uploads == 0){
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                        .append();
                if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
            });
            uploads++;
        }
        else{
            $("#files").html("");
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
            });
        }
        
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Continuer')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                // var link = $('<a>')
                //     .attr('target', '_blank')
                //     .prop('href', file.url);
                // $(data.context.children()[index])
                //     .wrap(link);
                $("#photo").val(file.url);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>       
          
<?php include_once("src/analytics.php") ?>  

</body>
</html>