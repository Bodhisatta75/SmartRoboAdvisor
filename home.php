<html>

<head>
    <script>
        function getReply() {
            let val = document.getElementById("user_input").value;
            let chatbox = document.getElementById("chatbox")
            let div1 = document.createElement("div");
            div1.innerHTML = val;
            console.log(val);
            chatbox.appendChild(div1);
            fetch('https://chatbot0098.herokuapp.com/chat_bot', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        msg: val
                    })
                })
                .then(response => response.text())
                .then(data => {
                    let div2 = document.createElement("div");
                    div2.innerHTML = data;
                    chatbox.appendChild(div2);
                });

            document.getElementById("user_input").value = "";
        }
    </script>
</head>

<body>
    <div id="chatbox">

    </div>
    <input type="text" id="user_input" placeholder="type message...">
    <button onclick="getReply()">Submit</button>
</body>

</html>