<html>
    <head>
        <title>LightOpenID Pop-up Test</title>
    </head>
    <body>
        <h1>LightOpenID Pop-up Test</h1>
        <script type="text/javascript">
            function showResult() {
                if (this.readyState === 4 && this.status === 200) {
                    console.log("show result");
                    document.getElementById("result").innerHTML = this.responseText;
                }
            }

            function popupDone(event) {
                console.log("popup done");
                if (event.source !== this.popupWindow) {
                    console.log("received message not from popup")
                    return;
                }
                if (event.data === "done") {
                    console.log("popup done");
                    this.popupWindow.close();
                    this.popupWindow = null;
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.onreadystatechange = showResult;
                    xmlHttp.open("GET", "lightopenid-popup-result.php", true);
                    xmlHttp.send();
                }
            }

            function openPopup() {
                window.addEventListener("message", popupDone, false);
                this.popupWindow = window.open('lightopenid-popup-window.php', 'IdentityProviderWindow', 'width=800,height=600');
            }

            function pingPopup() {
                if (typeof this.popupWindow === "undefined") {
                    return;
                }
                if (null === this.popupWindow) {
                    return;
                }
                // give the popup a handle towards the parent
                this.popupWindow.postMessage("ping", "*");
            }

            setInterval(pingPopup, 500);
        </script>
        <div id="result"></div>
        <button onclick="openPopup();">eID login</button>
        <p>
            <a href="./">Back</a>
        </p>
    </body>
</html>
