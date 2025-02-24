// Replace 'yourusername' with your actual Treehouse username
/* jshint esversion: 8 */
const apiUrl = 'https://kieron-oates.netmatters-scs.co.uk/inc/proxy.php'; // Replace with your domain

async function displayTreehousePoints() {
  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    const data = await response.json();
    const totalPoints = data.points.total;

    document.getElementById('treehouse-points').textContent = `Treehouse Score: ${totalPoints}`;
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
  }
}

displayTreehousePoints();
