// Inicializar partículas
particlesJS('particles-js', {
    particles: {
        number: { value: 80 },
        color: { value: '#64b5f6' },
        shape: { type: 'circle' },
        opacity: { value: 0.4 },
        size: { value: 3 },
        line_linked: {
            enable: true,
            distance: 150,
            color: '#90caf9',
            opacity: 0.3,
            width: 1
        },
        move: { enable: true, speed: 1.5 }
    },
    interactivity: {
        events: { onhover: { enable: true, mode: 'repulse' } },
        modes: { repulse: { distance: 100 } }
    },
    retina_detect: true
});
