<div id="login-model" class="model-overlay">
    <div class="model-body">
        <div class="modal-box" style="max-width:440px;">
            <div class="modal-header">
                <h4>Login</h4>
                <button class="modal-close" onclick="closeLoginViewer()">&#x2715;</button>
            </div>
            <div class="modal-body">
                <form action="/login" method="post" onsubmit="return submitLoginform()">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" name="email" id="login-email" required />
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" name="password" id="login-password" required />
                    </div>
                    <button type="submit" id="login-submit" name="submit" class="btn-submit">Login</button>
                    <button type="button" style="display:none;" id="login-submiting" disabled class="btn-submit" style="opacity:0.6;">Logging in...</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function submitLoginform() {
        document.getElementById('login-submit').style.display = 'none';
        document.getElementById('login-submiting').style.display = 'block';
        return true;
    }
</script>