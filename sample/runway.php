<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Circular Connected Runway Viewer</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #202020;
        }
        #container {
            width: 100vw;
            height: 100vh;
        }
        #turnButton {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="container"></div>
    <button id="turnButton">Turn Right</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 20, 50);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Runway geometry
        const runwayGeometry = new THREE.PlaneGeometry(10, 100);
        const runwayMaterial = new THREE.MeshStandardMaterial({ color: 0x333333, side: THREE.DoubleSide });

        // Create four connected runways
        const runways = [];
        for (let i = 0; i < 4; i++) {
            const runway = new THREE.Mesh(runwayGeometry, runwayMaterial);
            runway.rotation.x = -Math.PI / 2; // Make the runway horizontal
            
            // Set position based on the index
            runway.position.set(
                Math.cos(i * (Math.PI / 2)) * 50,
                0,
                Math.sin(i * (Math.PI / 2)) * 50
            );

            // Rotate runways to connect them
            if (i < 3) {
                runway.rotation.z = -Math.PI / 2; // Rotate to connect each runway
            } else {
                runway.rotation.z = 0; // Keep the last runway straight
            }

            runways.push(runway);
            scene.add(runway);
        }

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Camera control variables
        let isDragging = false;
        let previousMousePosition = { x: 0, y: 0 };

        function onMouseMove(event) {
            if (!isDragging) return;
            const deltaMove = {
                x: event.clientX - previousMousePosition.x,
                y: event.clientY - previousMousePosition.y
            };
            camera.position.y -= deltaMove.y * 0.05;
            previousMousePosition = { x: event.clientX, y: event.clientY };
        }

        renderer.domElement.addEventListener('mousedown', (event) => {
            isDragging = true;
            previousMousePosition = { x: event.clientX, y: event.clientY };
        });

        renderer.domElement.addEventListener('mouseup', () => {
            isDragging = false;
        });

        renderer.domElement.addEventListener('mousemove', onMouseMove);

        // Zoom functionality
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.05;
        });

        // Right turn button functionality
        const turnButton = document.getElementById('turnButton');
        let turned = false;

        turnButton.addEventListener('click', () => {
            if (!turned) {
                camera.position.set(50, 20, 0); // Move camera to view the runway from the side
                camera.lookAt(0, 0, 0); // Point camera at the center
                turned = true;
            } else {
                camera.position.set(0, 20, 50); // Reset camera to the initial position
                camera.lookAt(0, 0, 0); // Point camera back to the center
                turned = false;
            }
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>





<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Runway Viewer with Turn</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #202020;
        }
        #container {
            width: 100vw;
            height: 100vh;
        }
        #turnButton {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="container"></div>
    <button id="turnButton">Turn Right</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 20, 50);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Runway geometry (first section)
        const runwayGeometry = new THREE.PlaneGeometry(10, 100);
        const runwayMaterial = new THREE.MeshStandardMaterial({ color: 0x333333, side: THREE.DoubleSide });
        const runway = new THREE.Mesh(runwayGeometry, runwayMaterial);
        runway.rotation.x = -Math.PI / 2; // Make the runway horizontal
        scene.add(runway);

        // Walls for the first section
        const wallGeometry = new THREE.PlaneGeometry(10, 100);
        const leftWallMaterial = new THREE.MeshStandardMaterial({ color: 0x4444ff, side: THREE.DoubleSide });
        const rightWallMaterial = new THREE.MeshStandardMaterial({ color: 0xff4444, side: THREE.DoubleSide });

        const leftWall = new THREE.Mesh(wallGeometry, leftWallMaterial);
        leftWall.position.set(-5.5, 5, 0);
        leftWall.rotation.y = Math.PI / 2;
        scene.add(leftWall);

        const rightWall = new THREE.Mesh(wallGeometry, rightWallMaterial);
        rightWall.position.set(5.5, 5, 0);
        rightWall.rotation.y = -Math.PI / 2;
        scene.add(rightWall);

        // Second runway geometry (right turn starting at the end of the first)
        const runwayTurn = new THREE.Mesh(runwayGeometry, runwayMaterial);
        runwayTurn.rotation.x = -Math.PI / 2;
        runwayTurn.rotation.z = -Math.PI / 2; // Rotate to the right
        runwayTurn.position.set(5, 0, -50); // Position at the end of the first runway
        scene.add(runwayTurn);

        // Walls for the second section
        const leftWallTurn = new THREE.Mesh(wallGeometry, leftWallMaterial);
        leftWallTurn.position.set(5, 5, -55.5); // Adjust for new starting point
        leftWallTurn.rotation.y = 0; // Align with the turned runway
        scene.add(leftWallTurn);

        const rightWallTurn = new THREE.Mesh(wallGeometry, rightWallMaterial);
        rightWallTurn.position.set(5, 5, -44.5); // Adjust for new starting point
        rightWallTurn.rotation.y = Math.PI; // Align with the turned runway
        scene.add(rightWallTurn);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Mouse control variables
        let isDragging = false;
        let previousMousePosition = { x: 0, y: 0 };

        // Rotation control on mouse drag
        function onMouseMove(event) {
            if (!isDragging) return;

            const deltaMove = {
                x: event.clientX - previousMousePosition.x,
                y: event.clientY - previousMousePosition.y
            };

            runway.rotation.y += deltaMove.x * 0.005;
            camera.position.y -= deltaMove.y * 0.05;

            previousMousePosition = { x: event.clientX, y: event.clientY };
        }

        // Detect when mouse is pressed or released
        renderer.domElement.addEventListener('mousedown', (event) => {
            isDragging = true;
            previousMousePosition = { x: event.clientX, y: event.clientY };
        });

        renderer.domElement.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Mouse movement listener for rotation
        renderer.domElement.addEventListener('mousemove', onMouseMove);

        // Zoom functionality with scroll
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.05;
        });

        // Right turn button functionality
        const turnButton = document.getElementById('turnButton');
        let turned = false;

        turnButton.addEventListener('click', () => {
            if (!turned) {
                camera.position.set(20, 20, -50); // Move camera to view the turned section
                camera.lookAt(5, 0, -50); // Point camera towards the second runway
                turned = true;
            } else {
                camera.position.set(0, 20, 50); // Reset camera to the initial position
                camera.lookAt(0, 0, 0); // Point camera back to the first runway
                turned = false;
            }
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>-->



<!--with side 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Runway Viewer</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #202020;
        }
        #container {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="container"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 20, 50);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Runway geometry (rectangle shape)
        const runwayGeometry = new THREE.PlaneGeometry(10, 100);
        const runwayMaterial = new THREE.MeshStandardMaterial({ color: 0x333333, side: THREE.DoubleSide });
        const runway = new THREE.Mesh(runwayGeometry, runwayMaterial);
        runway.rotation.x = -Math.PI / 2; // Make the runway horizontal
        scene.add(runway);

        // Walls geometry (left and right of the runway)
        const wallGeometry = new THREE.PlaneGeometry(10, 100);
        const leftWallMaterial = new THREE.MeshStandardMaterial({ color: 0x4444ff, side: THREE.DoubleSide });
        const rightWallMaterial = new THREE.MeshStandardMaterial({ color: 0xff4444, side: THREE.DoubleSide });

        const leftWall = new THREE.Mesh(wallGeometry, leftWallMaterial);
        leftWall.position.set(-5.5, 5, 0);
        leftWall.rotation.y = Math.PI / 2;
        scene.add(leftWall);

        const rightWall = new THREE.Mesh(wallGeometry, rightWallMaterial);
        rightWall.position.set(5.5, 5, 0);
        rightWall.rotation.y = -Math.PI / 2;
        scene.add(rightWall);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Mouse control variables
        let isDragging = false;
        let previousMousePosition = { x: 0, y: 0 };

        // Rotation control on mouse drag
        function onMouseMove(event) {
            if (!isDragging) return;

            const deltaMove = {
                x: event.clientX - previousMousePosition.x,
                y: event.clientY - previousMousePosition.y
            };

            runway.rotation.y += deltaMove.x * 0.005;
            camera.position.y -= deltaMove.y * 0.05;

            previousMousePosition = { x: event.clientX, y: event.clientY };
        }

        // Detect when mouse is pressed or released
        renderer.domElement.addEventListener('mousedown', (event) => {
            isDragging = true;
            previousMousePosition = { x: event.clientX, y: event.clientY };
        });

        renderer.domElement.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Mouse movement listener for rotation
        renderer.domElement.addEventListener('mousemove', onMouseMove);

        // Zoom functionality with scroll
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.05;
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>-->



<!--
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Abstract Runway Loop</title>
  <style>
    body {
      margin: 0;
      overflow: hidden;
      background-color: #000;
    }
    #container {
      width: 100vw;
      height: 100vh;
    }
    #line-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      pointer-events: none;
    }
    .line {
      position: absolute;
      width: 3px;
      height: 100vh;
      background: linear-gradient(to bottom, #ff8c00, #ff0080); /* Gradient effect */
      opacity: 0.7;
      animation: move 4s linear infinite;
    }
    @keyframes move {
      0% { transform: translateX(-100vw); }
      100% { transform: translateX(100vw); }
    }
  </style>
</head>
<body>
  <div id="container"></div>
  <div id="line-container"></div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  <script>
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0x101010);

    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(0, 25, 100);

    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.getElementById('container').appendChild(renderer.domElement);

    const runwayGeometry = new THREE.PlaneGeometry(50, 300);
    const runwayMaterial = new THREE.MeshStandardMaterial({
      color: 0x222222,
      side: THREE.DoubleSide,
      wireframe: true, /* Adds grid effect */
      opacity: 0.6,
      transparent: true
    });
    const runway = new THREE.Mesh(runwayGeometry, runwayMaterial);
    runway.rotation.x = -Math.PI / 2;
    scene.add(runway);

    const ambientLight = new THREE.AmbientLight(0x404040, 2);
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 1.5);
    directionalLight.position.set(10, 20, 10);
    scene.add(directionalLight);

    function animate() {
      requestAnimationFrame(animate);
      renderer.render(scene, camera);
    }
    animate();

    window.addEventListener('resize', () => {
      renderer.setSize(window.innerWidth, window.innerHeight);
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
    });

    // Dynamic line creation
    const numLines = 20;
    const lineContainer = document.getElementById('line-container');
    for (let i = 0; i < numLines; i++) {
      const line = document.createElement('div');
      line.classList.add('line');
      line.style.left = `${i * (100 / numLines)}vw`;
      lineContainer.appendChild(line);
    }

    // Zoom effect on mouse wheel
    window.addEventListener('wheel', (event) => {
      camera.position.z += event.deltaY * 0.05;
      camera.position.z = Math.max(20, Math.min(200, camera.position.z));
    });
  </script>
</body>
</html>-->

