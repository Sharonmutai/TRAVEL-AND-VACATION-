<link rel="stylesheet" href="chat/style.css">
<div class="footer">
	<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
		                <ul>
		                   <li><a href="<?php echo PATH?>" style="text-decoration:none;">Home</a></li>
			  		   <li><a href="<?php echo PATH."/login.php"?>" style="text-decoration:none;">Login</a></li>
		                   </ul>
		              </div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="textcontact">
						<p>For Help/Support<br><br>Email Us:chep@gmail.com<br><br>Call Us:0745378674</br></p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>

<style>
.content {
	padding-bottom:0px !important;
}
#form111 {
                width:500px;
                margin:50px auto;
}
#search111{
                padding:8px 15px;
                background-color:#fff;
                border:0px solid #dbdbdb;
}
#button111 {
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid #ca072b;
                background-color:#ca072b;
                color:#fafafa;
}
#button111:hover  {
                background-color:#b70929;
                color:white;
}

</style>



<div class="row ">
    <div class="col-md-4">
                    <div class="container" style="position: fixed; bottom: 0px; right: 0px">
                        <div class="chatbox " >
                            <div class="cht">
                            <div  class="chatbox__support" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                               
                               
                                <div class="chatbox__header">
                                        <div class="chatbox__image--header">
                                            <img src="img/images/th.jpg"
                                                alt="image" height="70" width="70">
                                        </div>
                                        <div class="chatbox__content--header">
                                            <h4 class="chatbox__heading--header">Chat support</h4>
                                            <p class="chatbox__description--header">Hi. My name is Chep Assist Chatbot. How
                                                can I help you?</p>
                                        </div>
                                    </div>
                                    <div class="chatbox__messages">
                                        <div></div>
                                    </div>
                                    <div class="chatbox__footer">
                                        <input class="text-primary" type="text" placeholder="Write a message...">
                                        <button class="chatbox__send--footer send__button">Send</button>
                                    </div>
                              
                                  
                            </div>
                            </div>
                            
                            <div onclick="chat()" class="chatbox__button">
                                <button><img src="img/images/chatbox-icon.svg" /></button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <script>

var chatbox__support = document.querySelector(".cht");
chatbox__support.style.display="none";
function chat()
{
    
   
    if(chatbox__support.style.display == "none")
    {
        chatbox__support.style.display="block";
    }
    else{
        chatbox__support.style.display="none";
    }
    

}
</script>
    <script src="chat/app.js"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="js/auto-complete.js"></script>
 <link rel="stylesheet" href="css/auto-complete.css">
    <script>
        var demo1 = new autoComplete({
            selector: '#search111',
            minChars: 1,
            source: function(term, suggest){
                term = term.toLowerCase();
                <?php
						$qry2=mysqli_query($con,"select * from tbl_movie");
						?>
               var string="";
                <?php $string="";
                while($ss=mysqli_fetch_array($qry2))
                {
                
                $string .="'".strtoupper($ss['movie_name'])."'".",";
                //$string=implode(',',$string);
                
              
                }
                ?>
                //alert("<?php echo $string;?>");
              var choices=[<?php echo $string;?>];
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });
    </script>