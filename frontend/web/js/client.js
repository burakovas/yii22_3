if (!window.WebSocket) {
    alert("Your browser do not support sockets!!");
}

var webSocket =new WebSocket("ws://localhost:8081?channel=" + channel);

document.getElementById("chat_form")
    .addEventListener('submit', function (event) {
        var data = {
            message: this.message.value,
            channel: this.channel.value,
            user_id: this.user_id.value
            }
        ;

        webSocket.send(JSON.stringify(data));
        event.preventDefault();
        return false;
    });

webSocket.onmessage = function (event) {
    var data = event.data;
    var messageContainer = document.createElement('div');
    var textNode = document.createTextNode(data);
    messageContainer.appendChild(textNode);
    document.getElementById("root_chat")
        .appendChild(messageContainer);
};