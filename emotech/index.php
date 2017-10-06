<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        <link href="bot.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">     
        
        <style>
			img{width: 100px;}
			.room{cursor: pointer;height: 500px;
			    background-color: #fff;}
            .form-control {border-radius: 15px;}
        </style>
        <link href="style.css" rel="stylesheet">
    </head>
	<body>
        <div class="background-color: rgb(255,0,255);">
            <div id="chat">
                <div id="chat_head">  
                    <img src="1.png" style="width: 25px;"> EmoTech (Online)
                </div>
                <div id="response_cont">
                    <div id="intro">Please enter below details for future assistance 
                        <form method="post" onsubmit="return checkCookie(this)">
                            <input type="text" class="textd" name="username" id="username" required placeholder="Enter Name">
                            <input type="text" class="textd" name="mobile" id="mobile" required placeholder="Enter Mobile No."> 
                            <input type="text" class="textd" name="age" id="age" required placeholder="Enter Age">
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                    <div id="response"></div>
                </div>
              <div id="input_con">
            <input id="input" type="text" placeholder="Chat here..."> <button id="rec""><i class="fa fa-microphone" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="bot.js"></script>
</html>