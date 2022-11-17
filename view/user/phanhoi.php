    <div class="wrapper">
        <h1>Contact us</h1>
        <div id="error_message">
        </div>
        <form action="" id="myform" onsubmit="return validate();">
            <div class="top_input">
                <div class="input_field">
                    <h3>Name</h3>
                    <input type="text" placeholder="Enter your name..." id="name">
                </div>
                <div class="input_field">
                    <h3>Email address</h3>
                    <input type="text" placeholder="Your email address..." id="email">
                </div>
                <div class="input_field">
                    <h3>Subject</h3>
                    <input type="text" placeholder="Enter subject..." id="subject">
                </div>
                <div class="input_field">
                    <h3>Enquiry type</h3>
                    <input type="text" placeholder="Advertising" id="enquiry">
                </div>
            </div>
            <div class="bottom_input">
                <div class="input_field">
                    <h3>Messages</h3>
                    <textarea placeholder="Enter your messages..." id="message"></textarea>
                </div>
                <div class="btn">
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>

    <script>
        function validate() {
            var name = document.getElementById("name").value;
            var subject = document.getElementById("subject").value;
            var enquiry = document.getElementById("enquiry").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;
            var error_message = document.getElementById("error_message");

            error_message.style.padding = "10px";

            var text;
            if (name.length < 5) {
                text = "Please Enter valid Name";
                error_message.innerHTML = text;
                return false;
            }
            if (email.indexOf("@") == -1 || email.length < 6) {
                text = "Please Enter valid Email";
                error_message.innerHTML = text;
                return false;
            }
            if (subject.length < 10) {
                text = "Please Enter Correct Subject";
                error_message.innerHTML = text;
                return false;
            }
            if (isNaN(enquiry) || enquiry.length != 10) {
                text = "Please Enter Enquiry type";
                error_message.innerHTML = text;
                return false;
            }
            if (message.length <= 70) {
                text = "Please Enter More Than 70 Characters";
                error_message.innerHTML = text;
                return false;
            }
            alert("Form Submitted Successfully!");
            return true;
        }
    </script>

