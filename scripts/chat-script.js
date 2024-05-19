document.addEventListener("DOMContentLoaded", function () {
  const chatBox = document.getElementById("chat-box");
  const sendButton = document.getElementById("send-message");
  const sqlite3 = require("sqlite3").verbose();
  const messagebox = document.getElementById("message-text");
  chatBox.scrollTop = chatBox.scrollHeight;

  function addMessage(chat_id, sender_id, receiver_id, message) {
    let db = new sqlite3.Database(
      "./database/database.db",
      sqlite3.OPEN_READWRITE,
      (err) => {
        if (err) {
          console.error(err.message);
        }
      }
    );

    db.run(
      `INSERT INTO messages (chat_id, sender_id, receiver_id, message) VALUES (?, ?, ?, ?)`,
      [chat_id, sender_id, receiver_id, message],
      function (err) {
        if (err) {
          return console.error(err.message);
        }
      }
    );

    db.close((err) => {
      if (err) {
        console.error(err.message);
      }
    });
  }

  sendButton.addEventListener("click", function () {
    const message = messagebox.value;
    addMessage(chat_id, sender_id, receiver_id, message);
  });
});
