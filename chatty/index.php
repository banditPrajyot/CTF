<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="p-5">
    <div class="w-25 m-auto p-5 border border-dark rounded">
        <form action="/" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" class="form-control" />
                <label class="form-label" for="form2Example1">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" value="Sign in"/>
        </form>
        <?php 
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                echo '<div class="text-danger">Invalid Credentials</div>';
            }
        ?>
    </div>
    <div id="chatbot">
            <button class="btn btn-danger rounded-circle shadow mb-3" id="chat">bot</button>
            <div class="w-25 p-3 chat-window-main invisible border border-dark rounded" id="chat-window-main">
                <div class="chat-window" id="chat-window"></div>
                <textarea w=100% height=10% id="message"></textarea><br>
                <button class="btn btn-primary" id="send">send</button>
            </div>
    </div>
</body>
            <script>
                document.getElementById("chat").addEventListener("click", (e) => {
                    e.preventDefault();
                    document.getElementById("chat-window-main").classList.toggle("invisible");
                });

                document.getElementById("send").addEventListener("click", (e) => {
                    e.preventDefault();
                    let message = document.getElementById("message").value;
                    let chat_window = document.getElementById("chat-window");
                    client_message = document.createElement("div");
                    client_message.classList.add("bg-warning", "p-2", "m-2", "rounded");
                    client_message.innerText = encodeURIComponent(message);
                    chat_window.appendChild(client_message);
                    x = new XMLHttpRequest();
                    x.open("GET", "/764473d2-3200-4c99-b0ab-93b8137fce32/chatbot.php?message="+message, true);
                    x.onload = () => {
                        let server_message = document.createElement("div");
                        server_message.innerText = x.responseText;
                        server_message.classList.add("bg-success", "p-2", "m-2", "rounded");
                        chat_window.appendChild(server_message);
                    };
                    x.send();
                });
            </script>
</html>