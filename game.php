<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Saltos</title>
    <style>
        canvas {
            display: block;
            margin: 20px auto;
            background: #f0f0f0;
            border: 1px solid #000;
        }

        #startBtn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <button id="startBtn">Iniciar</button>
    <canvas id="gameCanvas" width="400" height="600"></canvas>

    <script>
        // Seleccionamos el canvas y su contexto
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');

        // Variables del jugador
        let player = {
            x: 180,
            y: 500,
            width: 30,
            height: 30,
            color: 'blue',
            speedX: 0,
            speedY: 0,
            gravity: 0.3,
            jumpPower: -8,
            isJumping: false,
        };

        // Variables de juego
        let platforms = [];
        let gameRunning = false;
        let platformSpeed = 1.5;
        let platformFrequency = 100; // Cuántos frames esperar antes de crear una nueva plataforma
        let frameCount = 0;

        // Botón de inicio
        const startBtn = document.getElementById('startBtn');
        startBtn.addEventListener('click', startGame);

        function startGame() {
            // Inicializa variables de juego
            player.x = 180;
            player.y = 500;
            player.speedX = 0;
            player.speedY = 0;
            player.isJumping = false;
            platforms = [];
            gameRunning = true;
            frameCount = 0;

            // Crear la primera plataforma
            createPlatform(150, 550, 100, 10);
            // Ocultar el botón de inicio
            startBtn.style.display = 'none';
            // Iniciar el bucle del juego
            requestAnimationFrame(updateGame);
        }

        function createPlatform(x, y, width, height) {
            platforms.push({
                x,
                y,
                width,
                height
            });
        }

        function updateGame() {
            if (!gameRunning) return;

            // Limpiar canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Movimiento del jugador
            player.speedY += player.gravity;
            player.x += player.speedX;
            player.y += player.speedY;

            // Limitar los movimientos del jugador a los bordes de la pantalla
            if (player.x < 0) player.x = 0;
            if (player.x + player.width > canvas.width) player.x = canvas.width - player.width;

            // Dibujar jugador
            ctx.fillStyle = player.color;
            ctx.fillRect(player.x, player.y, player.width, player.height);

            let isOnPlatform = false;

            // Mover y dibujar plataformas
            platforms.forEach((platform, index) => {
                platform.y -= platformSpeed;

                // Dibujar plataforma
                ctx.fillStyle = 'green';
                ctx.fillRect(platform.x, platform.y, platform.width, platform.height);

                // Colisión con la plataforma (si el jugador está cayendo)
                if (
                    player.speedY >= 0 && // El jugador está cayendo
                    player.x + player.width > platform.x && // Colisión horizontal
                    player.x < platform.x + platform.width &&
                    player.y + player.height <= platform.y && // El jugador está por encima de la plataforma
                    player.y + player.height + player.speedY >= platform.y // Está a punto de aterrizar en la plataforma
                ) {
                    player.speedY = 0; // Detener el movimiento vertical
                    player.y = platform.y - player.height; // Ajustar la posición del jugador a la parte superior de la plataforma
                    player.isJumping = false; // Permitir que salte de nuevo
                    isOnPlatform = true;
                }

                // Eliminar plataformas que salen de la pantalla
                if (platform.y + platform.height < 0) {
                    platforms.splice(index, 1);
                }
            });

            // Si el jugador no está en ninguna plataforma y no está saltando, está cayendo
            if (!isOnPlatform && !player.isJumping) {
                player.speedY += player.gravity;
            }

            // Crear nuevas plataformas
            frameCount++;
            if (frameCount % platformFrequency === 0) {
                const platformWidth = Math.random() * 100 + 50;
                createPlatform(Math.random() * (canvas.width - platformWidth), canvas.height, platformWidth, 10);
            }

            // Verificar si el jugador se sale de la pantalla (pierde)
            if (player.y > canvas.height || player.y + player.height < 0) {
                endGame();
                return;
            }

            // Solicitar el siguiente cuadro
            requestAnimationFrame(updateGame);
        }

        function endGame() {
            gameRunning = false;
            startBtn.style.display = 'block'; // Mostrar el botón de inicio
            alert('¡Has perdido!');
        }

        // Controles de teclado
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                player.speedX = -5;
            } else if (e.key === 'ArrowRight') {
                player.speedX = 5;
            } else if (e.key === ' ' && !player.isJumping) { // Salto con la barra espaciadora
                player.speedY = player.jumpPower;
                player.isJumping = true;
            }
        });

        document.addEventListener('keyup', (e) => {
            if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                player.speedX = 0;
            }
        });
    </script>
</body>

</html>