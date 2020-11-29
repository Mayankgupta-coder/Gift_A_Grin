
		async function getData(url) {
			const response = await fetch(url, {
			  method: 'GET',
			  mode: 'no-cors',
			  cache: 'no-cache',
			  credentials: 'same-origin',
			  headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			  },
			  redirect: 'follow',
			  referrerPolicy: 'no-referrer',
			});
			return "done";
		  }
		  
		  
		  function sendmail() {
			Name = $fname;
			Email = $email;
			subject = "Order Placed successfully";
			message = "Order Placed successfully";
			body = "<h4>Name:" + Name + "<br>Email: " + Email + "<br>Subject: " + subject + "<br>Message: " + message + "</h4>";
			var url = 'https://smartmenu.pythonanywhere.com/mail?from=noreply.jumblejuggle@gmail.com&to=mayankg1655@gmail.com&subject=Contact from https://knowrajatmore.web.app&body=You got some message&html=' + body
			getData(url);
			// reply = "<h4> Hii " + Name + ", <br><br>Hope you are well. <br><br> I have received your query subjected - <b>" + subject + "</b>.<br><br>I will contact to you shortly with more details. <br><br>Regards,</h6><br><h3>Rajat Shrivastava</h3>";
			// var url = 'https://smartmenu.pythonanywhere.com/mail?from=noreply.jumblejuggle@gmail.com&to=' + Email + '&subject=Contact from https://knowrajatmore.web.app&body=You got some message&html=' + reply
			// getData(url);
		  alert("success");
			
		  }
		