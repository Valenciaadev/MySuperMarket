<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Clinica</title>
    <style>
        .neumorphic-inner {
            background: #FFFFFF;
            box-shadow: inset 6px 6px 12px #d4d6de, inset -6px -6px 12px #ffffff;
        }

        .neumorphic-input {
            background: #EFF1F9;
            box-shadow: inset 4px 4px 8px #d4d6de, inset -4px -4px 8px #ffffff;
            padding-left: 40px; 
            transition: border 0.3s, box-shadow 0.3s;
        }

        .input-container {
            position: relative;
        }

        .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF; 
            font-size: 20px;
        }

        .neumorphic-input::placeholder {
            color: #9CA3AF; 
        }

        .neumorphic-input:focus {
            border: 2px solid #6EE345;
            box-shadow: 0 0 8px #64FC2E;
            outline: none;
        }

        .logo-container {
            background: #2A5A19;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .logo-container img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: #ffffff;
            box-shadow: 
                inset 0 -5px 5px rgba(255, 255, 255, 0.8), 
                inset 0 5px 5px rgba(7, 104, 59, 0.4);
        }

        .header-background {
            background: #2A5A19;
            height: 100px;
            width: 100%;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            position: relative;
        }

        .neumorphic-button {
            background: #2A5A19;
            box-shadow: 
                6px 6px 12px rgba(255, 255, 255, 0.6), 
                -6px -6px 12px rgba(255, 255, 255, 0.9);
            transition: 0.3s;
        }

        .neumorphic-button:hover {
            background: #2A5A19;
        }

        .neumorphic-button:active {
            box-shadow: inset 6px 6px 12px rgba(0, 139, 37, 0.6), 
                        inset -6px -6px 12px rgba(4, 122, 6, 0.6);
        }
    </style>    
</head>
<body class=" flex items-center justify-center min-h-screen" style="background-color:rgb(243, 243, 237);">
    <div class="neumorphic-inner rounded-lg relative" style="width: 450px; height: 450px;">
        <div class="header-background"></div>
        <div class="logo-container">
            <img src="/Configuraciones/img/logo_b.png" alt="Clínica Dental Esdent">
        </div>
        <div class="flex flex-col items-center mt-16">
            <h2 class="text-2xl font-bold text-center text-green-900">MY SUPERMARKET</h2>
        </div>
        <form action="#" method="POST" class="space-y-4 px-16 mt-12">
            <div class="input-container">
                <i class="bx bx-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Correo Electrónico" class="neumorphic-input w-full p-3 rounded-full focus:outline-none focus:ring-2 focus:ring-[#2A5A19] focus:border-[#2A5A19]">
                 
            </div>
            <div class="input-container">
                <i class='bx bx-lock-keyhole'></i>
                <input type="password" id="pswrd" name="email" placeholder="Contraseña" class="neumorphic-input w-full p-3 rounded-full focus:outline-none focus:ring-2 focus:ring-[#2A5A19] focus:border-[#2A5A19]">
                 
            </div>
             
            

            <button type="submit" class="w-full p-2 rounded-full text-white font-bold neumorphic-button focus:outline-none focus:ring-4 focus:ring-green-300">
                Iniciar Sesión
            </button>
        </form>

        <p class="mb-4 mt-4 text-center text-sm text-gray-600">
        </p>
    </div>
</body>
</html>