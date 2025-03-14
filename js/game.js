/* jshint esversion: 6 */

document.addEventListener('DOMContentLoaded', function() {
    const refreshButton = document.getElementById('new-game');
    const gameList = ["Minecraft", "COD", "Overwatch", "Terraria", "Hearthstone", "Yu-Gi-Oh","Pokemon"]; 

    getGame();

    function getGame() {
        const randomIndex = Math.floor(Math.random() * gameList.length);
        const randomGame = gameList[randomIndex];
        const gameDisplay = document.getElementById('game-display');
        
        if (randomGame !== gameDisplay.textContent) {
            gameDisplay.style.opacity = '0';
            gameDisplay.style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                gameDisplay.textContent = randomGame;
                gameDisplay.style.opacity = '1';
                gameDisplay.style.transform = 'translateY(0)';
            }, 300);
        } else {
            getGame();
        }
    }
    
    refreshButton.addEventListener('click', function() {
        refreshButton.classList.add('rotate');
        getGame();
        setTimeout(() => refreshButton.classList.remove('rotate'), 1000);
    });
});