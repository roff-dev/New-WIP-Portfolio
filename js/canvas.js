const canvas = document.getElementById("backgroundCanvas");
    const ctx = canvas.getContext("2d");

    // Set canvas size to fill the viewport
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const lines = []; // Store line segments
    const numLines = 100; // Adjust the number of lines
    const maxLineLength = 200; // Max length of each line
    const speed = 1; // Speed of movement

    // Generate initial line positions and velocities
    for (let i = 0; i < numLines; i++) {
      lines.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: (Math.random() - 0.5) * speed,
        vy: (Math.random() - 0.5) * speed,
        length: Math.random() * maxLineLength + 50,
      });
    }

    // Function to draw the lines
    function drawLines() {
      ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
      ctx.strokeStyle = "#404040"; // Line color to match theme
      ctx.lineWidth = 2;

      lines.forEach((line) => {
        ctx.beginPath();
        ctx.moveTo(line.x, line.y);
        ctx.lineTo(
          line.x + line.vx * line.length,
          line.y + line.vy * line.length
        );
        ctx.stroke();
      });
    }

    // Update line positions
    function updateLines() {
      lines.forEach((line) => {
        line.x += line.vx;
        line.y += line.vy;

        // Bounce off edges
        if (line.x < 0 || line.x > canvas.width) line.vx *= -1;
        if (line.y < 0 || line.y > canvas.height) line.vy *= -1;
      });
    }

    // Animation loop
    function animate() {
      drawLines();
      updateLines();
      requestAnimationFrame(animate);
    }

    // Resize canvas on window resize
    window.addEventListener("resize", () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    });

    animate();