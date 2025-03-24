
let recognition;
function startRecognition() {
  if (!('webkitSpeechRecognition' in window)) {
    alert('Speech recognition not supported in this browser.');
    return;
  }

  recognition = new webkitSpeechRecognition();
  recognition.lang = "en-US";
  recognition.interimResults = false;
  recognition.maxAlternatives = 1;

  recognition.onresult = function(event) {
    document.getElementById("userInput").value = event.results[0][0].transcript;
  };

  recognition.onerror = function(event) {
    alert("Error occurred in recognition: " + event.error);
  };

  recognition.start();
}

function sendToGPT() {
  const userText = document.getElementById("userInput").value;
  if (!userText.trim()) return;

  fetch("proxy.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({ prompt: userText })
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById("responseBox").innerText = data.response;
  })
  .catch(err => {
    console.error(err);
    document.getElementById("responseBox").innerText = "Something went wrong.";
  });
}
