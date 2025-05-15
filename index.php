<html>
    <head>

        <script>

            let user = (JSON.parse(localStorage.getItem("userData"))) ?? false;
            // console.log(user)

            if(user) {
                let url = user.role === "admin" ? "app/admin" : "app/admin";
                window.location = url;
            }else if(user) {
                let url = user.role === "nurse" ? "app/local-apps/clinic/nurse" : "";
                window.location = url;
            }else {
                window.location = "public/login.php"
            }

        </script>

    </head>
</html>