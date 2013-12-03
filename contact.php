<?php include "includes/classmember.php"; 

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rpassword']))
{
$account = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $repeatpassword = htmlspecialchars($_POST['rpassword']);
   $propo = htmlspecialchars($_POST['text']);
 
    
    if ($password != $repeatpassword)
    {
        echo "Les mots de passe ne correspondent pas";
    }
    else
    {
        switch (Member::Create(0, $account, $password, $email))
        {
            case "OK":
                echo "Vous Ãªtes bien inscrit, bon jeu sur Utopia !</br>";
                break;
            case "error_username":
                echo "Merci de bien vouloir indiquer un identifiant valide</br>";
                echo "<a href='inscription.php' style='color:blue' >Retour Ã  l'inscription</a></br>";
                break;
            case "error_mail":
                echo "Merci de bien vouloir indiquer une adresse mail valide</br>";
                echo "<a href='inscription.php' style='color:blue' >Retour Ã  l'inscription</a></br>";
                break;
            case "error_mail":
                echo "Merci de bien vouloir indiquer une adresse mail valide</br>";
                echo "<a href='inscription.php' style='color:blue' >Retour Ã  l'inscription</a></br>";
                break;
            case "error_name_already_used":
                echo "Cet identifiant est dÃ©jÃ  utilisÃ©</br>";
                echo "<a href='inscription.php' style='color:blue' >Retour Ã  l'inscription</a></br>";
                break;
            case "error_mail_already_used":
                echo "Cet adresse mail est dÃ©jÃ  utilisÃ©</br>";
                echo "<a href='inscription.php' style='color:blue' >Retour Ã  l'inscription</a></br>";
                break;
            default:
                echo "Erreur interne (0x1)";
                break;
        }
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Orizon - The Gaming template</title>

<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" />
<!-- Included CSS Files -->
<link rel="stylesheet" href="stylesheets/main.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/devices.css" type="text/css" media="screen" title="no title" charset="utf-8"  />
<link rel="stylesheet" href="stylesheets/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<!--[if IE ]>
<link rel="stylesheet" href="stylesheets/ie.css"> 
<![endif]-->
</head>

<body>

<!--********************************************* Main wrapper Start *********************************************--> 
<div id="footer_image">
<div id="main_wrapper">

    <!--********************************************* Logo Start *********************************************-->
    <div id="logo"> <a href="#"><img alt="alt_example" src="./images/logo.png"  /></a>
      <div id="social_ctn"> 
      
      <a class="social_t"><img alt="alt_example" src="./images/social_tleft.png" /></a> 
  
      <a href="#" id="rss"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a> 
      <a href="#" id="facebook"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a> 
      <a href="#" id="twitter"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a>  
      <a href="#" id="google_plus"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a>
      <a href="#" id="you_tube"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a> 
    
      <a class="social_t" ><img alt="alt_example" src="./images/social_tright.png" /></a> 
      
      </div>
    
    </div>
    <!--********************************************* Logo end *********************************************--> 
    
    <!--********************************************* Main_in Start *********************************************-->
    <div id="main_in">  
      
    <!--********************************************* Mainmenu Start *********************************************-->
   <?php include "includes/menu.php"; ?>
    
    <!--********************************************* Mainmenu end *********************************************--> 
        
        

     <!--********************************************* Main start *********************************************-->
     <div id="main_news_wrapper">
 
       <div id="row"> 
       <!-- Left wrapper Start -->
        <div id="left_wrapper">
                <div class="header">
                	<h2><span>Abyss//</span> <a href="./post_list.html">contact</a></h2>
                </div>
                 
                <div id="post_wrapper">
                
                    <!-- Leave a response Start -->
                    <div id="response" class="contact_form">
                    	<h1> Drop us a message! </h1>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque sit amet lacus justo. Mauris suscipit dolor id lacus commodo ultricies elementum ante tempor. Sed lacus arcu, iaculis id auctor commodo, facilisis eget felis. </p>

                        <form id="form"  action="" method="post">
                        	<div class="form_left">
                           
                                <label>Pseudo <small><em>(requis)</em></small></label>
                                <input name="username" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" />
                             
                                <label>Email <small><em>(requis)</em></small></label>
                                <input name="email" type="text" class="validate[required,custom[email]] text-input" id="email" />
                              
                                <label>Mot de passe</label>
                                <input type="password" name="pass" id="web" />
                          
                                <label>Répétez votre mot de passe</label>
                                <input type="rpassword" name="pass" id="web" />
                            </div>
                            <div class="form_right">
                            <p class="text">
                            <label>A propos <small><em></em></small></label>
                            <textarea name="text" class="validate[required,length[6,300]] text-input" id="comment" cols="10" rows="10"></textarea>
                            </p>
    						</div>
                            
                            <div class="form_submit"><input type="submit" value="S'inscrire" class="read_more2" />
                            </div>
                        </form>

                    </div>
                    <!-- Leave a response end -->  
                    
                    
                    <div class="clear"></div>
               </div> 
            </div>
            <!-- Left wrapper end -->
            
            <!-- Right wrapper Start -->
            <?php include "includes/sidebar.php"; ?>
  
    <!--********************************************* Main end *********************************************--> 
    
    <!--********************************************* Main advert start *********************************************-->
    
    <!--********************************************* Main advert end *********************************************--> 

    <!--********************************************* Footer start *********************************************-->
   <?php include "includes/footer.php"; ?>