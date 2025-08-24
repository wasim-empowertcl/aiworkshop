// Animated background for hero section
window.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h;
    function resize() {
        w = canvas.width = canvas.offsetWidth;
        h = canvas.height = canvas.offsetHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    // Minimalist animated dots & lines
    const dots = Array.from({length: 18}, () => ({
        x: Math.random() * w,
        y: Math.random() * h,
        vx: (Math.random()-.5)*0.9,
        vy: (Math.random()-.5)*0.9,
        r: 2 + Math.random()*2
    }));

    function draw() {
        ctx.clearRect(0,0,w,h);
        dots.forEach(dot => {
            dot.x += dot.vx;
            dot.y += dot.vy;
            if(dot.x<0||dot.x>w) dot.vx*=-1;
            if(dot.y<0||dot.y>h) dot.vy*=-1;
        });
        // Draw dots
        dots.forEach(dot => {
            ctx.beginPath();
            ctx.arc(dot.x, dot.y, dot.r, 0, 2*Math.PI);
            ctx.fillStyle = "#845ef7";
            ctx.globalAlpha = 0.7;
            ctx.fill();
            ctx.globalAlpha = 1;
        });
        // Draw lines for nearby dots
        for(let i=0; i<dots.length; ++i){
            for(let j=i+1; j<dots.length; ++j){
                const dx = dots[i].x - dots[j].x;
                const dy = dots[i].y - dots[j].y;
                const dist = Math.sqrt(dx*dx + dy*dy);
                if(dist < 120){
                    ctx.beginPath();
                    ctx.moveTo(dots[i].x, dots[i].y);
                    ctx.lineTo(dots[j].x, dots[j].y);
                    ctx.strokeStyle = "#845ef7";
                    ctx.globalAlpha = 0.12;
                    ctx.stroke();
                    ctx.globalAlpha = 1;
                }
            }
        }
        requestAnimationFrame(draw);
    }
    draw();
});

// Minimal AJAX contact form (no backend, just demo behavior)
document.getElementById('contact-form').addEventListener('submit', function(e){
    e.preventDefault();
    document.getElementById('form-msg').textContent = "Thank you! We'll be in touch soon.";
    this.reset();
});
