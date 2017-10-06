<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        
        <style>
        	div.scrollmenu {
			    overflow: auto;
			    white-space: nowrap;
			    width: 500px;
			}
			img{width: 100px;}
			.room{cursor: pointer;height: 180px;
			    background-color: #fff;}
        </style>
        <link href="style.css" rel="stylesheet">
    </head>
	<body>
        <div class="background-color: rgb(255,0,255);">
            <div class="panel panel-info" style="border: none;">            	
                <div class="panel-heading" style="">
	               	<div class="row">
	               		<div class="col-md-10 col-sm-10 col-xs-10">
	                   		<div style="text-align: center;">Emotech</div>
	                   		<!-- <div style="text-align: center;">Your professional assistant by Bookingjini </div> -->
	                   	</div>
	                   	<div class="col-md-2 col-sm-2 col-xs-2 settings" style="text-align: center;">
	                   		<i class="fa fa-cog" aria-hidden="true" id="button"></i>
	                   	</div>
	               	</div>
	               	<div class="toggler" style="">
						<div id="effect" class="ui-widget-content ui-corner-all">
						    <ul>
	                       		<li><i class="fa fa-commenting" aria-hidden="true"></i> Talk to a human</li>
	                       		<li><i class="fa fa-bell" aria-hidden="true"></i> Enable notifications</li>
	                       		<li><i class="fa fa-sign-out" aria-hidden="true"></i> Go to Bookingjini</li>
	                       	</ul>
					  	</div>
					</div>
				</div>
                <div class="panel-body fixed-panel" id="response_cont">
                	<div id="chat">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="patient_name" class="form-control" placeholder="Name">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="patient_mobile" class="form-control" placeholder="Mobile">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="patient_age" class="form-control" placeholder="Age">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>            
                        </div>   
                    </div>
                </div>
                <div class="panel-footer">
                    <form method="post" id="chatbot-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Message" name="messageText" id="messageText" autofocus style="border-radius: 35px;padding: 22px;"/>
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" id="chatbot-form-btn"><i class="fa fa-microphone" aria-hidden="true" id="microphone"></i>  <i class="fa fa-paper-plane" aria-hidden="true" id="send"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
        $(function() {
            $('#chatbot-form-btn').click(function(e) {
                e.preventDefault();
                $('#chatbot-form').submit();
            });

            $('#chatbot-form').submit(function(e) {
                e.preventDefault();                
                var message = $('#messageText').val();
                $("#chat").append('<div class="req"><img src="img/chat-img.jpg"><div class="query">' + message + '</div></div></div>');
                $("#response_cont").animate({
            		scrollTop: $("#response_cont")[0].scrollHeight
            	}, "fast");
            	$('#messageText').val('');
            	
                $.ajax({
                    type: "POST",
                    url: "ask.php",
                    data: $(this).serialize(),
                    success: function(response)
                    {                        
                        //var answer = response.answer;
                        //const chatPanel = document.getElementById("chatPanel");
                        $("#chat").append('<div class="res"><img src="img/jini.png"><div class="response">' + response + '</div></div>');
						$("#response_cont").animate({
		            		scrollTop: $("#response_cont")[0].scrollHeight
		            	}, "fast");
		            	$('#messageText').val('');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
        </script>
<script>
  $( function() {
    // run the currently selected effect
    $( "#effect" ).hide();
    $( "#button" ).click(function() {
		  $( "#effect" ).toggle( "blind", 500 );
		});
  } );
 </script>
  <script>
  	$(document).ready(function() {
  		$("#send").hide();
		$("#messageText").keyup(function()
		{
			if($("#messageText").val()=='')
			{
				$("#send").hide();
				$("#microphone").show();
			}
			else
			{
				$("#microphone").hide();
				$("#send").show();
			}
		});
	});
  </script>
    </body>
</html>