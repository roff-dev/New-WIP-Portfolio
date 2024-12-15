document.addEventListener('DOMContentLoaded', function() {
    const refreshButton = document.getElementById('new-game');
    const gameList = ["Minecraft", "COD", "Overwatch", "Terraria", "Hearthstone", "Yu-Gi-Oh","Pokemon"]; 

    getGame();

    function getGame() {
        const randomIndex = Math.floor(Math.random() * gameList.length);
        const randomGame = gameList[randomIndex];
        const gameDisplay = document.getElementById('game-display');
        if (randomGame !== gameDisplay.textContent) {
            gameDisplay.textContent = randomGame;
        } else {
            getGame();
        }
        
    }
    
    refreshButton.addEventListener('click', function() {
        getGame();
    });

});