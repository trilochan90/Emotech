$(document).ready(function(){
      $("#chat_head").click(function(){
          $("#response_cont").slideToggle();
          $("#input").slideToggle();
          $("#rec").slideToggle();
      });
  });
  //var accessToken = "b877138e75454d459b0d194e471a051e";
  var accessToken = "0a10da33fc784796888ce62b0d992022";
    var baseUrl = "https://api.api.ai/v1/";
    $(document).ready(function() {
      $("#response_cont").hide();
        $("#input").hide();
        $("#rec").hide();
        checkCookie();
      $("#input").keypress(function(event) {
        if (event.which == 13) {
          event.preventDefault();
          send();
        }
      });
      $("#rec").click(function(event) {
        switchRecognition();
      });
    });
    var recognition;
    function startRecognition() {
      recognition = new webkitSpeechRecognition();
      recognition.onstart = function(event) {
        updateRec();
      };
      recognition.onresult = function(event) {
        var text = "";
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            text += event.results[i][0].transcript;
          }
          setInput(text);
        stopRecognition();
      };
      recognition.onend = function() {
        stopRecognition();
      };
      recognition.lang = "en-US";
      recognition.start();
    }
  
    function stopRecognition() {
      if (recognition) {
        recognition.stop();
        recognition = null;
      }
      updateRec();
    }
    function switchRecognition() {
      if (recognition) {
        stopRecognition();
      } else {
        startRecognition();
      }
    }
    function setInput(text) {
      $("#input").val(text);
      send();
    }
    function updateRec() {
      //$("#rec").text(recognition ? "Stop" : "Speak");
      if(recognition)
      {
        $("#rec").addClass("speak");
        $("#rec").removeClass("stop");
      }
      else
      {
        $("#rec").removeClass("speak");
        $("#rec").addClass("stop");
      }
      
    }
    function send() {
      var text = $("#input").val();
      $("#response").append("<div class='request_text'>"+text+"</div>");
      $("#response").append("<div class='lod'><img src='http://52.66.107.183/js/typing.gif' width='80' /></div>");
      $("#response_cont").animate({
            scrollTop: $("#response_cont")[0].scrollHeight}, "fast");
      $("#input").val("");

      //text= text+" in "+ 156;

      $.ajax({

        type: "POST",
        url: baseUrl + "query?v=20150910",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        headers: {
          "Authorization": "Bearer " + accessToken
        },
        data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
        success: function(data) {
          setResponse(data.result.fulfillment.speech);
        },
        error: function() {
          setResponse("No Internet");
        }
      });
      //setResponse("Loading...");
      //$("#input").val("");
    }
    
    function setResponse(val)
    {      
      $("#response").append("<div class='response_text'>"+val+"</div>");
      $(".lod").css('display','none');
      $("#response_cont").animate({
            scrollTop: $("#response_cont")[0].scrollHeight}, "fast");
      
    }
    function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(dis) {
    var user=getCookie("username");
    var age=getCookie("age");
    var mobile=getCookie("mobile");
    if (user != "" && mobile != "") {
        //alert("Welcome again " + user);
        $("#response_cont").slideToggle();
        $("#input").slideToggle();
        $("#rec").slideToggle();
        $("#intro").hide();
        setResponse("Welcome again " + user);
        setResponse("How can I help you?");
        return false;
    } else {
       //user = prompt("Please enter your name:","");
        user =document.getElementById("username").value;
        age =document.getElementById("age").value;
        mobile =document.getElementById("mobile").value;
       if (user != "" && user != null && age != "" && age != null && mobile != "" && mobile != null) {
           var res = registerPatient(user, age, mobile);
           console.info(res);
           //res = JSON.parse(res);
           //var return_data = res.data;
           //console.info(return_data);
           /*if(return_data!='success' && return_data!='')
           {
            setResponse("Welcome again" + return_data.patient_name);
            setResponse("How can I help you?");
            setCookie("username", return_data.patient_name, 30);
            setCookie("age", return_data.patient_age, 30);
            setCookie("mobile", return_data.patient_mobile, 30);
           }
           else if(return_data=='success')
           {
            setResponse("Welcome " + user);
            setResponse("How can I help you?");
            setCookie("username", user, 30);
            setCookie("age", age, 30);
            setCookie("mobile", mobile, 30);
           }*/
           //sendMail(user, email, mobile);
           $("#intro").hide();
           return false;
       }
    }
    return false;
}

function registerPatient(user, age, mobile)
{
  var result_data='';
  $.ajax({
    type: "POST",
    url: "register.php",
    data: {
      'username' : user,
      'age' : age,
      'mobile' : mobile
    },
    success: function(response)
    {  
      var res = $.parseJSON(response);
      var return_data = res.data;
      console.info(return_data.data);
      if(return_data!='success' && return_data!='')
      {
        setResponse("Welcome again " + return_data.patient_name);
        setResponse("How can I help you?");
        setCookie("username", return_data.patient_name, 30);
        setCookie("age", return_data.patient_age, 30);
        setCookie("mobile", return_data.patient_mobile, 30);
      }
      else if(return_data=='success')
      {
        setResponse("Welcome " + user);
        setResponse("How can I help you?");
        setCookie("username", user, 30);
        setCookie("age", age, 30);
        setCookie("mobile", mobile, 30);
      }
    },
    error: function(error) {
        console.log(error);
    }
  });
  console.info(result_data); 
  //return result;
}

function sendMail(user, email, mobile)
{
          $.ajax({
                  type:'POST',
                  url:'http://52.66.107.183/mail.php',
                  data:{
                      'name' :user,
                      'email' :email,
                      'mobile' :mobile,

                  },
                  success:function(html){
                      //console.info(html);
                  },
                  error: function (exception) {
                  console.log(exception);
                  //alert(exception);
              }
              });

}

