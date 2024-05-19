document.addEventListener("DOMContentLoaded", function () {
  const chatBox = document.getElementById("chat-box");
  const sendButton = document.getElementById("send-message");
  const messagebox = document.getElementById("message-text");
  chatBox.scrollTop = chatBox.scrollHeight;

  sendButton.addEventListener("click", function () {
    const message = messagebox.value;

    // Create a new AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chat.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the request
    xhr.send(
      "chat_id=" +
        chat_id +
        "&sender_id=" +
        sender_id +
        "&receiver_id=" +
        receiver_id +
        "&message=" +
        message
    );

    // Handle the response
    xhr.onload = function () {
      if (xhr.status == 200) {
        console.log("Message sent successfully");
        location.reload();  
      } else {
        console.log("Error sending message");
      }
    };
  });
});
