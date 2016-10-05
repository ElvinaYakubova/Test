<?php
	class contact extends ACore {
	
		public function get_content(){
			echo '<div class = "content" id = "main">
					<div class="left">
						<form action = "" id ="formSend" name = "formSend" method="post">
		                    <label for="subject">Message theme</label>
		                    <input type = "text" class = "field" placeholder = "Enter theme" name = "subject" id = "subject" />
		                    <label for="email">Email</label>
		                    <input type = "email" class = "field" placeholder = "Enter email" name = "email" id = "email" maxlength = "50" required="required"/>
		                    <label for="name">Name</label>
		                    <input type = "text" class = "field" placeholder = "Enter name" name = "name" id = "name" maxlength="50" required="required"/>
		                    <label for="message">Message</label>
		                    <textarea placeholder = "Enter your message" name = "message" id = "message" required="required"></textarea>
		                    <input type = "submit" value = "Send" id = "send" name = "send">
		                </form>
		                <div id = "answer"></div>
		            </div>';
		}
	}
?>
