<?php
    include_once LAYOUTS . 'main_head.php';

    setHeader($d);
?>

<div class="container">
    <div class="card mt-5 w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Inicio de sesión</h5>
            <hr>
            <form action="" id="login-form">
                <div class="form-group input-group">
                    <label for="email" class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </label>
                    <input type="text" class="form-control"
                            id="email"
                            name="email"
                            placeholder="Correo electrónico"
                            required>
                </div>
                <div class="form-group input-group mt-2">
                    <label for="passwd" class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </label>
                    <input type="password" class="form-control"
                            id="passwd"
                            name="passwd"
                            placeholder="Contraseña"
                            required>
                </div>
                <div class="d-grid gap-2 my-2">
                    <small class="form-text text-danger d-none" id="error">
                        Sus datos de inicio de sesión son incorrectos
                    </small>
                    <hr>
                    <button class="btn btn-primary mt-3" type="submit">
                        Iniciar sesión <i class="bi bi-box-arrow-in-right"></i>
                    </button>
                    <a href="/Register" class="btn btn-link float-end">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    include_once LAYOUTS . 'main_foot.php';
    setFooter($d);
?>

    <script>
        $( function(){
            const $lf = $("#login-form")
            $lf.on("submit", function(e){
                e.preventDefault();
                e.stopPropagation();
                const data = new FormData( this )
                fetch( app.routes.login,{
                    method : 'POST',
                    body : data
                }).then( resp => resp.json() )
                .then ( resp => {
                    if( resp.r !== false ){
                        location.href = "/"
                    }else{
                        $("#error").removeClass('d-none')
                    }
                }).catch( err => console.error( err ))
            })
        })
    </script>

<?php
    closeFooter();