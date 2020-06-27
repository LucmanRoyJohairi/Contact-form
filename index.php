
<?php 
    //print_r($_POST);
    if(sizeof($_POST) > 0){
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $error = "";
        $info = '<div class="alert alert-danger" role="alert">Please fill out all the fields below!</div>';

        if($email == "" || $subject == "" || $message == "" ){
            $error .= $info;
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = '<div class="alert alert-danger" role="alert">Invalid email format!</div>';
        }else {
            $reciever = "rjaylightning@gmail.com";
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = "From: ".$_POST['email'];
            if(mail($reciever,$subject, $message, $headers)){
                $error = '<div class="alert alert-success" role="alert"><strong>Message Sent,</strong> We will get back to you ASAP!</div>';
            }else{
                $error = '<div class="alert alert-danger" role="alert">Message not sent, try again later!</div>';
            }

        
        }
    }
    

?>
<html>
    <head>
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>

    </head>
    <body>
        <section class="container p-5 m-5 border">
            <form method="post">
                <h1>Contact Us</h1>
                <div id="error"><?php echo $error; ?></div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="your email address">
                    <!--<span class="text-secondary pt-5">We'll never share your email with anyone else</span>-->    
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="your subject">
                </div>
                <div class="form-group">
                    <label for="message">What would you like to ask us?</label>
                    <textarea name="message" class="form-control" id="message" rows="3" placeholder="I would like to..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section> 
    </body>

    <!--JQuery part/ Client-side validation-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type='text/javascript'>
        $("form").submit(function(e) {
            e.preventDefault();
            let error = "";
            const info = '<div class="alert alert-danger" role="alert">Please fill out all the fields below!</div>';

            if($("#subject").val() == ""){
                error += info;
            }else if($("#email").val() == ""){
                error += info;
            }else if($("#message").val() == ""){
                error += info;
            }else{
                error += '<div class="alert alert-success" role="alert">processing request...</div>';
                $("form").unbind("submit").submit();
            }
            $("#error").html(error);
        });
    </script>
</html>